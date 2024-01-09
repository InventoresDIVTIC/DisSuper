<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\Drivers\Web\Extensions\Widget;

class BotManController extends Controller
{
    /**
     * Configure the BotMan widget.
     */
    public function configureWidget()
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $config = [
            'title' => 'DisSuper',
            // Otras configuraciones que puedas tener...
        ];

        $botman = BotManFactory::create($config);
        $botman->middleware->received(new \BotMan\Drivers\Web\Extensions\Widget($config));
    }

    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            if (stripos($message, 'hola') !== false) {
                $this->askName($botman);
            } elseif (preg_match('/horario de trabajo/i', $message)) {
                $botman->reply('Nuestro horario laboral es de lunes a viernes de 9:00 am a 5:00 pm.');
            } elseif (preg_match('/vacaciones/i', $message)) {
                $botman->reply('El periodo de vacaciones se programa con anticipación. ¿Necesitas información específica sobre las políticas de vacaciones?');
            } elseif (preg_match('/permisos/i', $message)) {
                $botman->reply('Los permisos deben ser solicitados al departamento de recursos humanos. ¿Necesitas más detalles sobre el proceso de solicitud de permisos?');
            } else {
                $botman->reply("Lo siento, no tengo información sobre eso en este momento. ¿Puedo ayudarte con algo más?");
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hola, ¿cuál es tu nombre?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('¡Hola, ' . $name . '! ¿En qué puedo ayudarte?');
        });
    }
    
}
