<?php

namespace Fuying\Xunfei;

use Fuying\Xunfei\Xunfei\XunfeiBase;

/**
 * 讯飞语音转化文字
 */
class Xunfei
{
    /**
     * 预处理方法
     */
    public function prepare($file)
    {
        $extData = [
            'file_len' => $file->file_size,
            'file_name' => $file->file_name,
            'slice_num' => 1,
        ];
        $xunfei = new XunfeiBase;
        
        return $xunfei->prepare($extData);
    }

    /**
     * 上传方法
     */
    public function upload($taskId, $file)
    {
        $extData = [
            'task_id' => $taskId,
            'slice_id' => 'aaaaaaaaaa',
            'content' => fopen($file->file_path, 'r'),
        ];
        $xunfei = new XunfeiBase;
        
        return $xunfei->upload($extData);
    }

    /**
     * 合并文件
     */
    public function merge($taskId)
    {
        $extData = [
            'task_id' => $taskId,
        ];
        $xunfei = new XunfeiBase;
        
        return $xunfei->merge($extData);
    }

    /**
     * 获取进度
     */
    public function getProgress($taskId)
    {
        $extData = [
            'task_id' => $taskId,
        ];
        $xunfei = new XunfeiBase;
        
        return $xunfei->getProgress($extData);
    }

    /**
     * 获取结果
     */
    public function getResult($taskId)
    {
        $extData = [
            'task_id' => $taskId,
        ];
        $xunfei = new XunfeiBase;
        
        return $xunfei->getResult($extData);
    }

    public function test()
    {
        echo '德玛西亚, 万众一心, 哈哈哈哈';
    }
}
