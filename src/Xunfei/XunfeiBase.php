<?php

namespace Fuying\Xunfei\Xunfei;

use Fuying\Xunfei\Xunfei\HttpBase;

/**
 * 讯飞基类
 */
class XunfeiBase
{
    /**
     * 发送请求对象
     */
    private $client;

    /**
     * 构造方法
     */
    public function __construct()
    {
        $baseUri = config('xunfei.baseUri', 'http://raasr.xfyun.cn/api/');

        $this->client = new HttpBase($baseUri);
    }

    /**
     * 预处理方法
     */
    public function prepare($extData)
    {
        return $this->client->postForm('prepare', $extData);
    }

    /**
     * 上传方法
     */
    public function upload($extData)
    {
        return $this->client->postMulti('upload', $extData);
    }

    /**
     * 合并方法
     */
    public function merge($extData)
    {
        return $this->client->postForm('merge', $extData);
    }

    /**
     * 预处理方法
     */
    public function getProgress($extData)
    {
        return $this->client->postForm('getProgress', $extData);
    }

    /**
     * 预处理方法
     */
    public function getResult($extData)
    {
        return $this->client->postForm('getResult', $extData);
    }
}
