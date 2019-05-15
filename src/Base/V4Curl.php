<?php
/**
 * creator: maigohuang
 */ 
namespace Vcloud\Base;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class V4Curl extends BaseCurl 
{
    protected $ak = "";
    protected $sk = "";

    public function __construct($ak = "", $sk = "")
    {
        $this->ak = $ak;
        $this->sk = $sk;

        $this->stack = HandlerStack::create();
        $this->stack->push($this->replaceUri());
        $this->stack->push($this->v4Sign());

        $config = $this->getConfig();
        $this->client = new Client([
            'handler' => $this->stack,
            'base_uri' => $config['host'],
        ]);
    }

    protected function v4Sign()
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $v4 = new SignatureV4();
                $credentials = $this->prepareCredentials($options['v4_credentials']);
                $request = $v4->signRequest($request, $credentials);
                return $handler($request, $options);
            };
        };
    }

    private function prepareCredentials(array $credentials) 
    {
        if (!isset($credentials['ak']) || !isset($credentials['sk'])) {
            if ($this->ak != "" && $this->sk != "") {
                $credentials['ak'] = $this->ak;
                $credentials['sk'] = $this->sk;
            }elseif (getenv("VCLOUD_ACCESSKEY") != "" && getenv("VCLOUD_SECRETKEY") != "") {
                $credentials['ak'] = getenv("VCLOUD_ACCESSKEY");
                $credentials['sk'] = getenv("VCLOUD_SECRETKEY");
            }else {
                $json = json_decode(file_get_contents(getenv('HOME') . '/.vcloud/config'), true);
                if (is_array($json) && isset($json['ak']) && isset($json['sk'])) {
                    $credentials = array_merge($credentials, $json);
                }
            }
        }
        return $credentials;
    }

    public function getRequestUrl($api, array $config = [])
    {
        $config_api = isset($this->apiList[$api]) ? $this->apiList[$api] : false;

        $defaultConfig = $this->getConfig();
        $config = $this->configMerge($defaultConfig['config'], $config_api['config'], $config);
        $info = array_merge($defaultConfig, $config_api);

        $method = $info['method'];
        $request = new Request($method, $info['host'].$info['url'].'?'.http_build_query($config['query']));

        $credentials = $this->prepareCredentials($config['v4_credentials']);
        $v4 = new SignatureV4();

        return $v4->signRequestToUrl($request, $credentials);
    }
}
