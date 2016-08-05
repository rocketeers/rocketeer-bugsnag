<?php

namespace Rocketeer\Plugins\Bugsnag;

use Rocketeer\Plugins\AbstractPlugin;
use Rocketeer\Services\Tasks\TasksHandler;

class Bugsnag extends AbstractPlugin
{
    /**
     * @var string
     */
    protected $name = 'rocketeer-bugsnag';

    /**
     * {@inheritdoc}
     */
    public function onQueue(TasksHandler $tasks)
    {
        $tasks->after('deploy', function ($task) {
            $task->explainer->line('Clearing bugsnag errors');

            $curl = curl_init('http://notify.bugsnag.com/deploy');
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HEADER, ['Content-Type: application/json']);

            $params = [
                'apiKey' => $this->getPluginOption('key'),
                'releaseStage' => $this->connections->getCurrentConnectionKey()->stage,
            ];

            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
            curl_exec($curl);
        });
    }

}
