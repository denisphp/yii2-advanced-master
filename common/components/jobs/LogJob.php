<?php

namespace common\components\jobs;

use yii\base\Exception;
use yii\log\Logger;

class LogJob extends Job
{
//    public $rideId;
//    public $forceSync;

    public $message;

    public function execute()
    {
//        \Yii::getLogger()->log($this->message, Logger::LEVEL_INFO, 'background');

        return true;
    }

//    public function execute()
//    {
//        $result = RideHistoryExporter::syncRequest($this->rideId, false, $this->forceSync);
//        if($result !== true){
//            $message = "Ride ID ".$this->rideId." not synced with global.";
//            if(!empty($result)){
//                $message .= ' Response: '.json_encode($result);
//            }
//            throw new Exception($message);
//        }
//    }
}
