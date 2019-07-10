<?php

namespace Fuying\Xunfei\Xunfei;

use GuzzleHttp\Client;

/**
 * 发送请求基类
 */
class HttpBase
{
    /**
     * guzzle对象
     */
    private $client;
    // AppID
    private $appId;
    // ApiKey
    private $apiKey;

    /**
     * 构造方法
     */
    public function __construct($baseUri)
    {
        $this->appId = config('xunfei.appId', '5cedfe0f');
        $this->apiKey = config('xunfei.apiKey', '93c4e9bfc7b3e834d6be02177eaaad6d');
        $this->client = new Client(['base_uri' => $baseUri]);
    }

    /**
     * 发送post请求,form表单
     */
    public function postForm($keyWord, $extData)
    {
        $baseData = $this->getBaseData();
        $data = array_merge($baseData, $extData);

        // 发起urlencode请求
        $response = $this->client->request('POST', $keyWord, [
            'form_params' => $data
        ]);

        return json_decode($response->getBody()->getContents(), 1);
    }

    /**
     * 发送post请求,form表单
     */
    public function postMulti($keyWord, $extData)
    {
        $baseData = $this->getBaseData();
        $data = array_merge($baseData, $extData);

        // 发起urlencode请求
        $response = $this->client->request('POST', $keyWord, [
            'multipart' => $this->changeDataFormat($data)
        ]);

        return json_decode($response->getBody()->getContents(), 1);
    }

    /**
     * 加密算法
     * 
     * @param   int     $time   当前时间戳
     * 
     * @return  string
     */
    private function makeSign($time)
    {
        // 拼写基本数据
        $baseString = $this->appId . $time;
        // 进行md5加密
        $md5String = md5($baseString);
        // 进行HmacSHA1加密
        $signString = base64_encode(hash_hmac("sha1", $md5String, $this->apiKey, true));

        return $signString;
    }

    /**
     * 获取基本数据信息
     * 
     * @return  array
     */
    private function getBaseData()
    {
        $time = time();

        return [
            'app_id' => $this->appId,
            'signa' => $this->makeSign($time),
            'ts' => $time,
        ];
    }

    /**
     * 改变数据格式
     * 
     * @return  array
     */
    private function changeDataFormat($array)
    {
        $return = [];

        foreach ($array as $key => $val) {
            $return[] = [
                'name' => $key,
                'contents' => $val,
            ];
        }

        return $return;
    }
}
