<?php
namespace console\controllers;

use Pheanstalk\Job;
use udokmeci\yii2beanstalk\BeanstalkController;
use yii\helpers\Console;
use Yii;
use yii\log\Logger;

class WorkerController extends BeanstalkController
{
    // Those are the default values you can override
    const DELAY_PRIORITY = "1000"; //Default priority
    const DELAY_TIME = 5; //Default delay time

    // Used for Decaying. When DELAY_MAX reached job is deleted or delayed with
    const DELAY_MAX = 3;

    public function actionStats()
    {
//        print_r($queue->listTubes());
//        print_r($queue->listTubesWatched());
//        print_r($queue->listTubeUsed());
        print_r(Yii::$app->beanstalk->stats());
    }

    public function listenTubes()
    {
        return ["tube"];
    }

    /**
     *
     * @param Job $job
     * @return string  self::BURY
     *                 self::RELEASE
     *                 self::DELAY
     *                 self::DELETE
     *                 self::NO_ACTION
     *                 self::DECAY
     *
     */
    public function actionTube($job)
    {
        $sentData = $job->getData();

        Yii::getLogger()->log('beanstalk error log', Logger::LEVEL_ERROR);
        Yii::getLogger()->log('beanstalk background info log', Logger::LEVEL_INFO, 'background');
        try {
            $job = self::deserializeJob($sentData);

            if ($job->execute()) {
                fwrite(STDOUT, Console::ansiFormat("- Everything is allright" . "\n", [Console::FG_GREEN]));
            }
        } catch (\Exception $e) {
            fwrite(STDERR, Console::ansiFormat($e . "\n", [Console::FG_RED]));
        }

        return self::DELETE;
    }

    /**
     * @param mixed $sentData
     * @return \common\components\jobs\Job
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
     */
    private static function deserializeJob($sentData)
    {
        $sentData = (array)$sentData;
        /** @var Object $job */
        $job = Yii::createObject($sentData);
        if (!$job instanceof \common\components\jobs\Job) {
            throw new \Exception("That isn't job");
        }
        return $job;
    }
}
