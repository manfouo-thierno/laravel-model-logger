<?php 

namespace App\ModelLogger;

use Illuminate\Database\Eloquent\Model;

class ModelChangeLogger
{
    public function created(Model $model)
    {
        $this->logChange('created', $model);
    }

    public function updated(Model $model)
    {
        $this->logChange('updated', $model);
    }

    // ... handle other events

    protected function logChange($eventName, Model $model)
    {
        // Prepare data for logging
        $data = [
            'event' => $eventName,
            'model' => get_class($model),
            'attributes' => $model->getAttributes(),
            // ... other relevant data
        ];

        // Send data to the external API
        $this->sendLog($data);
    }

    protected function sendLog($data)
    {
        // Use HTTP client to send data to the external API
        print_r($data);
    }
}
