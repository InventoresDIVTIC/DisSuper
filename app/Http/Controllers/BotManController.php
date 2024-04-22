<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\Drivers\Web\Extensions\Widget;

class BotManController extends Controller
{

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
            } elseif (preg_match('/estoy loco/i', $message)) {
                $botman->reply('En un mundo de locos, es al cuerdo al que llaman loco');
            } elseif (preg_match('/subir un documento/i', $message)) {
                $botman->reply('Para subir un documento de un empleado necesitar ir al perfil del empleado y desde ahi entrar al apartado de documentos y al subapartado de subir documento');
            } elseif (preg_match('/encontre un error/i', $message)) {
                $botman->reply('Si usted ha encontrado un error en el programa, favor de comunicarse con el administrador del sistema y reportarlo para su pronta resolucion');
            } elseif (preg_match('/comunico con el administrador/i', $message)) {
                $botman->reply('Para contactar con el administrador puede mandar un correo a jesus.quintero7478@alumnos.udg.mx');
            } elseif (preg_match('/contacto con el administrador/i', $message)) {
                $botman->reply('Para contactar con el administrador puede mandar un correo a jesus.quintero7478@alumnos.udg.mx');
            } elseif (preg_match('/quien es el administrador/i', $message)) {
                $botman->reply('El sistema tiene 2 administradores, Jesus Eduardo Quintero Gomez y David Guadalupe Vargas Lopez');
            } elseif (preg_match('/quienes son los administradores/i', $message)) {
                $botman->reply('Nuestro horario laboral es de lunes a viernes de 9:00 am a 5:00 pm.');
            } elseif (preg_match('/como veo las notificaciones/i', $message)) {
                $botman->reply('Para ver las notificaciones necesitas acceder a su respectiva area. Para hacerlo se da click en el boton de la campana en la parte superior derecha de la pantalla');
            } elseif (preg_match('/no tengo notificaciones/i', $message)) {
                $botman->reply('Si usted no tiene notificaciones puede ser porque no tiene documentos pendientes');
            } elseif (preg_match('/gustan los tacos/i', $message)) {
                $botman->reply('A mi me encantan los tacos, pero no puedo comerlos ya que estoy encerrado en esta computadora para ayudarte');
            } elseif (preg_match('/veo los documentos/i', $message)) {
                $botman->reply('Para ver los documentos de un empleado solo necesitas acceder a su perfil y darle al boton descargar del documento que quieras visualizar. Despues de descargarlo solo tienes que abirlo en tu computadora');
            } elseif (preg_match('/ver los documentos/i', $message)) {
                $botman->reply('Para ver los documentos de un empleado solo necesitas acceder a su perfil y darle al boton descargar del documento que quieras visualizar. Despues de descargarlo solo tienes que abirlo en tu computadora');
            } elseif (preg_match('/no esta mi zona/i', $message)) {
                $botman->reply('Si no encuentra su zona en las opciones, le recomendamos reportarlo a su superior para que sea agregada a la brevedad');
            } elseif (preg_match('/no encuentro mi zona/i', $message)) {
                $botman->reply('Si no encuentra su zona en las opciones, le recomendamos reportarlo a su superior para que sea agregada a la brevedad');
            } elseif (preg_match('/no existe mi zona/i', $message)) {
                $botman->reply('Si no encuentra su zona en las opciones, le recomendamos reportarlo a su superior para que sea agregada a la brevedad');
            } elseif (preg_match('/no esta un empleado/i', $message)) {
                $botman->reply('Si no encuentra su empleado en el sistema, le recomendamos reportarlo a su superior para que sea agregado a la brevedad');
            } elseif (preg_match('/no encuentro un empleado/i', $message)) {
                $botman->reply('Si no encuentra su empleado en el sistema, le recomendamos reportarlo a su superior para que sea agregado a la brevedad');
            } elseif (preg_match('/no esta registrado un empleado/i', $message)) {
                $botman->reply('Si no encuentra su empleado en el sistema, le recomendamos reportarlo a su superior para que sea agregado a la brevedad');
            } elseif (preg_match('/no existe un empleado/i', $message)) {
                $botman->reply('Si no encuentra su empleado en el sistema, le recomendamos reportarlo a su superior para que sea agregado a la brevedad');
            } elseif (preg_match('/telefono de/i', $message)) {
                $botman->reply('Si desea contactar con alguien, puede revisar el directorio del programa. Ahi estan guardados los contactos del personal importante');
            } elseif (preg_match('/contacto con/i', $message)) {
                $botman->reply('Si desea contactar con alguien, puede revisar el directorio del programa. Ahi estan guardados los contactos del personal importante');
            } elseif (preg_match('/como reporto un problema/i', $message)) {
                $botman->reply('Para reportar un problema del sistema debe mandar un correo al administrador o a su jefe explicandolo detalladamente');
            } elseif (preg_match('/reportar un problema/i', $message)) {
                $botman->reply('Para reportar un problema del sistema debe mandar un correo al administrador o a su jefe explicandolo detalladamente');
            } elseif (preg_match('/llamada de atencion/i', $message)) {
                $botman->reply('Para hacer una llamada de atencion es necesario acceder al perfil del empleado objetivo y si el documento correspondiente es llamada de atencion, te dejara llenar un formulario para generarla. Tambien puedes optar por la opcion de subirla directamente al sistema');
            } elseif (preg_match('/rendicion de cuentas/i', $message)) {
                $botman->reply('Para hacer una rendicion de cuentas es necesario acceder al perfil del empleado objetivo y si el documento correspondiente es rendicion de cuentas, te dejara llenar un formulario para generarla. Tambien puedes optar por la opcion de subirla directamente al sistema');
            } elseif (preg_match('/acta administrativa/i', $message)) {
                $botman->reply('Para hacer un acta administrativa es necesario acceder al perfil del empleado objetivo y si el documento correspondiente es acta administrativa, te dejara llenar subir un documento directamente al sistema');
            } elseif (preg_match('/cambiar contraseña/i', $message)) {
                $botman->reply('Si quieres cambiar tu contraseña, necesitras acceder a tu perfil y desde ahi modificarla');
            } elseif (preg_match('/accedo a mi perfil/i', $message)) {
                $botman->reply('Para acceder a tu perfil necesitas poner el cursor sobre nombre de perfil y automaticamente se mostrara un boton. Da click ahi y accederas a tu perfil');
            } elseif (preg_match('/acceder a mi perfil/i', $message)) {
                $botman->reply('Para acceder a tu perfil necesitas poner el cursor sobre nombre de perfil y automaticamente se mostrara un boton. Da click ahi y accederas a tu perfil');
            } elseif (preg_match('/no carga/i', $message)) {
                $botman->reply('Si el sistema no carga, revisa tu conexion a internet. En dado caso de que el internet funcione correctamente, favor de reportar el problema con el administrador');
            } elseif (preg_match('/error 505/i', $message)) {
                $botman->reply('Si te sale un error 505, manda un correo al administrador diciendo cual es el error y que pagina te lo mostro. El error se solucionara a la brevedad');
            } elseif (preg_match('/error 504/i', $message)) {
                $botman->reply('Si te sale un error 504, manda un correo al administrador diciendo cual es el error y que pagina te lo mostro. El error se solucionara a la brevedad');
            } elseif (preg_match('/correo del administrador/i', $message)) {
                $botman->reply('Para contactar con el administrador puede mandar un correo a jesus.quintero7478@alumnos.udg.mx');
            } elseif (preg_match('/dios existe?/i', $message)) {
                $botman->reply('No se, espero haberte ayudado');
            } elseif (preg_match('/jornada laboral /i', $message)) {
                $botman->reply(': La jornada máxima de trabajo diaria según la Ley Federal del Trabajo es de 8 horas.');
            } elseif (preg_match('/derechos tengo/i', $message)) {
                $botman->reply('Como trabajador, tienes derecho a recibir un salario mínimo digno y justo que te permita cubrir tus necesidades básicas y las de tu familia.');
            } elseif (preg_match('/jornada maxima de trabajo semanal/i', $message)) {
                $botman->reply(' La jornada máxima de trabajo semanal es de 48 horas.');
            } elseif (preg_match('/período de descanso/i', $message)) {
                $botman->reply(' Después de 6 horas de trabajo continuo, tienes derecho a un período de descanso de al menos 30 minutos.');
            } elseif (preg_match('/tiempo maximo de trabajo extra/i', $message)) {
                $botman->reply('El máximo de horas extra permitido por día es de 3 horas, y por semana es de 9 horas.');
            } elseif (preg_match('/(derecho|vacaiones)\s+/iu', $message)) {
                $botman->reply('Tienes derecho a un periodo de vacaciones anuales pagadas que varía dependiendo de tu antigüedad en el empleo, pero generalmente son al menos 6 días hábiles.');
            } elseif (preg_match('/renunciar\s+/i', $message)) {
                $botman->reply('Si quieres renunciar debes notificar por escrito a tu empleador con al menos 15 días de anticipación tu decisión de renunciar.');
            } elseif (preg_match('/tipos de contratos/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo reconoce contratos por tiempo indefinido, por tiempo determinado, de obra o servicio determinado, y por temporada.');
            } elseif (preg_match('/(derechos|despido injusto)/i', $message)) {
                $botman->reply('Tienes derecho a recibir una indemnización y a demandar reinstalación en tu puesto de trabajo.');
            } elseif (preg_match('/(obligaciones|jefe)/i', $message)) {
                $botman->reply('El empleador está obligado a proporcionar un ambiente de trabajo seguro y saludable, así como a cumplir con las normativas de seguridad e higiene laboral.');
            } elseif (preg_match('/obligaciones|empleador/i', $message)) {
                $botman->reply('El empleador está obligado a proporcionar un ambiente de trabajo seguro y saludable, así como a cumplir con las normativas de seguridad e higiene laboral.');
            } elseif (preg_match('/derechos laborales/i', $message)) {
                $botman->reply('Tus derechos laborales están protegidos por la Ley Federal del Trabajo.');
            } elseif (preg_match('/incapacidad laboral/i', $message)) {
                $botman->reply('Para solicitar una incapacidad laboral, necesitas un certificado médico y comunicarlo a recursos humanos.');
            } elseif (preg_match('/vacaciones/i', $message)) {
                $botman->reply('Para solicitar vacaciones, debes presentar una solicitud por escrito a tu supervisor.');
            } elseif (preg_match('/acoso laboral/i', $message)) {
                $botman->reply('Si experimentas acoso laboral, comunícalo inmediatamente a tu supervisor o recursos humanos.');
            } elseif (preg_match('/despido injustificado/i', $message)) {
                $botman->reply('Estás protegido contra el despido injustificado por la Ley Federal del Trabajo.');
            } elseif (preg_match('/horarios de trabajo/i', $message)) {
                $botman->reply('Los horarios de trabajo están regulados por la empresa y pueden variar según el departamento.');
            } elseif (preg_match('/permisos laborales/i', $message)) {
                $botman->reply('Los permisos laborales deben ser solicitados y aprobados por recursos humanos o tu supervisor.');
            } elseif (preg_match('/seguridad laboral/i', $message)) {
                $botman->reply('La seguridad laboral es prioridad y se deben seguir las normativas y procedimientos establecidos.');
            } elseif (preg_match('/pago de salarios/i', $message)) {
                $botman->reply('El pago de salarios se realiza de acuerdo a las políticas y a la Ley Federal del Trabajo.');
            } elseif (preg_match('/prestaciones laborales/i', $message)) {
                $botman->reply('Las prestaciones laborales incluyen seguro social, aguinaldo y vacaciones, entre otras.');
            } elseif (preg_match('/registro de jornada laboral/i', $message)) {
                $botman->reply('Es importante registrar tu jornada laboral para el cumplimiento de las normativas.');
            } elseif (preg_match('/renuncia voluntaria/i', $message)) {
                $botman->reply('Si deseas renunciar voluntariamente, debes notificar a recursos humanos con anticipación.');
            } elseif (preg_match('/salud ocupacional/i', $message)) {
                $botman->reply('La salud ocupacional es fundamental y se deben seguir las medidas de seguridad y prevención.');
            } elseif (preg_match('/formación y capacitación/i', $message)) {
                $botman->reply('La empresa puede proporcionar formación y capacitación para el desarrollo profesional.');
            } elseif (preg_match('/retribución económica/i', $message)) {
                $botman->reply('La retribución económica puede incluir salario base, bonificaciones y beneficios adicionales.');
            } elseif (preg_match('/reglamento interno de trabajo/i', $message)) {
                $botman->reply('El reglamento interno de trabajo establece las normas y políticas de la empresa.');
            } elseif (preg_match('/exámenes médicos laborales/i', $message)) {
                $botman->reply('Los exámenes médicos laborales pueden ser requeridos para garantizar la salud y seguridad en el trabajo.');
            } elseif (preg_match('/jubilación/i', $message)) {
                $botman->reply('El proceso de jubilación está sujeto a las disposiciones de la empresa y las leyes vigentes.');
            } elseif (preg_match('/maternidad/paternidad/i', $message)) {
                $botman->reply('Los derechos de maternidad/paternidad están protegidos por la ley y la empresa puede ofrecer beneficios adicionales.');
            } elseif (preg_match('/compensación por accidentes de trabajo/i', $message)) {
                $botman->reply('La compensación por accidentes de trabajo puede incluir atención médica y compensación económica.');
            } elseif (preg_match('/confidencialidad de información/i', $message)) {
                $botman->reply('La confidencialidad de la información es fundamental y debes respetarla en todo momento.');
            } elseif (preg_match('/código de ética/i', $message)) {
                $botman->reply('El código de ética establece los principios y valores que deben seguir los empleados de la empresa.');
            } elseif (preg_match('/vacantes internas/i', $message)) {
                $botman->reply('Las vacantes internas pueden ser publicadas para que los empleados puedan postularse.');
            } elseif (preg_match('/evaluación del desempeño/i', $message)) {
                $botman->reply('La evaluación del desempeño puede ser realizada periódicamente para evaluar el rendimiento laboral.');
            } elseif (preg_match('/retribución por horas extras/i', $message)) {
                $botman->reply('Las horas extras pueden ser retribuidas de acuerdo a las políticas de la empresa y la ley.');
            } elseif (preg_match('/programa de bienestar laboral/i', $message)) {
                $botman->reply('El programa de bienestar laboral puede incluir actividades y beneficios para promover la salud y el bienestar de los empleados.');
            } elseif (preg_match('/conciliación laboral y familiar/i', $message)) {
                $botman->reply('La conciliación laboral y familiar es importante y la empresa puede ofrecer medidas para facilitarla.');
            } elseif (preg_match('/registro de asistencia/i', $message)) {
                $botman->reply('Es importante registrar tu asistencia de acuerdo a los horarios establecidos por la empresa.');
            } elseif (preg_match('/procedimiento disciplinario/i', $message)) {
                $botman->reply('El procedimiento disciplinario puede ser aplicado en caso de incumplimiento de normas y políticas.');
            } elseif (preg_match('/seguro de vida/i', $message)) {
                $botman->reply('La empresa puede ofrecer un seguro de vida como parte de las prestaciones laborales.');
            } elseif (preg_match('/derecho de sindicación/i', $message)) {
                $botman->reply('Los empleados tienen derecho a sindicarse y la empresa debe respetar este derecho.');
            } elseif (preg_match('/permiso por enfermedad/i', $message)) {
                $botman->reply('Puedes solicitar permiso por enfermedad presentando un certificado médico.');
            } elseif (preg_match('/protección de datos personales/i', $message)) {
                $botman->reply('La empresa debe proteger tus datos personales de acuerdo a la ley de protección de datos.');
            } elseif (preg_match('/premios por antigüedad/i', $message)) {
                $botman->reply('Puedes recibir premios por antigüedad de acuerdo a las políticas de la empresa.');
            } elseif (preg_match('/prohibición de discriminación/i', $message)) {
                $botman->reply('La discriminación está prohibida por la ley y la empresa debe promover la igualdad de oportunidades.');
            } elseif (preg_match('/póliza de seguro de gastos médicos mayores/i', $message)) {
                $botman->reply('La empresa puede ofrecer una póliza de seguro de gastos médicos mayores como beneficio adicional.');
            } elseif (preg_match('/vacaciones adelantadas/i', $message)) {
                $botman->reply('Puedes solicitar vacaciones adelantadas con la aprobación de tu supervisor y recursos humanos.');
            } elseif (preg_match('/salario mínimo/i', $message)) {
                $botman->reply('Tu salario debe cumplir con el salario mínimo establecido por la ley.');
            } elseif (preg_match('/reintegro de gastos/i', $message)) {
                $botman->reply('Puedes solicitar el reintegro de gastos autorizados de acuerdo a las políticas de la empresa.');
            } elseif (preg_match('/plan de pensiones/i', $message)) {
                $botman->reply('La empresa puede ofrecer un plan de pensiones como beneficio adicional para tu jubilación.');
            } elseif (preg_match('/derecho de huelga/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a huelga en caso de conflictos laborales.');
            } elseif (preg_match('/contrato laboral/i', $message)) {
                $botman->reply('El contrato laboral establece los términos y condiciones de tu empleo.');
            } elseif (preg_match('/denuncia anónima/i', $message)) {
                $botman->reply('Puedes realizar una denuncia anónima en caso de irregularidades o conductas indebidas.');
            } elseif (preg_match('/horas de comida/i', $message)) {
                $botman->reply('Las horas de comida están reguladas por la ley y la empresa debe proporcionar un tiempo mínimo.');
            } elseif (preg_match('/protección a la maternidad/i', $message)) {
                $botman->reply('La protección a la maternidad está garantizada por la ley y la empresa debe respetar estos derechos.');
            } elseif (preg_match('/compensación por trabajo en días festivos/i', $message)) {
                $botman->reply('El trabajo en días festivos puede ser compensado con un pago adicional o tiempo libre.');
            } elseif (preg_match('/seguro de desempleo/i', $message)) {
                $botman->reply('Puedes tener derecho a un seguro de desempleo en caso de perder tu empleo.');
            } elseif (preg_match('/permiso de paternidad/i', $message)) {
                $botman->reply('Los padres tienen derecho a un permiso de paternidad después del nacimiento de un hijo.');
            } elseif (preg_match('/requisitos para jubilación/i', $message)) {
                $botman->reply('Los requisitos para la jubilación pueden variar según la ley y los programas de la empresa.');
            } elseif (preg_match('/capacitación en seguridad laboral/i', $message)) {
                $botman->reply('La capacitación en seguridad laboral es obligatoria y puede incluir cursos y ejercicios prácticos.');
            } elseif (preg_match('/derecho de pensión/i', $message)) {
                $botman->reply('Tienes derecho a una pensión de acuerdo a las contribuciones realizadas durante tu vida laboral.');
            } elseif (preg_match('/incentivos por productividad/i', $message)) {
                $botman->reply('Puedes recibir incentivos por productividad de acuerdo a tu rendimiento laboral.');
            } elseif (preg_match('/reintegro de gastos médicos/i', $message)) {
                $botman->reply('Puedes solicitar el reintegro de gastos médicos autorizados según las políticas de la empresa.');
            } elseif (preg_match('/permiso por luto/i', $message)) {
                $botman->reply('Puedes solicitar un permiso por luto en caso de fallecimiento de un familiar cercano.');
            } elseif (preg_match('/política de igualdad de género/i', $message)) {
                $botman->reply('La empresa puede tener una política de igualdad de género para promover la igualdad en el trabajo.');
            } elseif (preg_match('/procedimiento para denunciar irregularidades/i', $message)) {
                $botman->reply('Puedes seguir un procedimiento específico para denunciar irregularidades de manera confidencial.');
            } elseif (preg_match('/derechos sindicales/i', $message)) {
                $botman->reply('Tienes derecho a formar parte de un sindicato y participar en actividades sindicales.');
            } elseif (preg_match('/protección contra el acoso sexual/i', $message)) {
                $botman->reply('La empresa debe proporcionar un entorno laboral seguro y proteger contra el acoso sexual.');
            } elseif (preg_match('/seguridad en el trabajo/i', $message)) {
                $botman->reply('La seguridad en el trabajo es responsabilidad de todos y debes seguir las normas y procedimientos.');
            } elseif (preg_match('/política de diversidad e inclusión/i', $message)) {
                $botman->reply('La empresa puede tener una política de diversidad e inclusión para promover la igualdad de oportunidades.');
            } elseif (preg_match('/incentivos por productividad/i', $message)) {
                $botman->reply('Puedes recibir incentivos por productividad de acuerdo a tu rendimiento laboral.');
            } elseif (preg_match('/que es un indicador/i', $message)) {
                $botman->reply('Un indicador es uno de los requerimentos que se debe cumplir en una labor');
            } elseif (preg_match('/como añado un indicador/i', $message)) {
                $botman->reply('Para añadir un indicador necesitas tener los permisos necesarios. Si los tienes solo tienes que is al apartado indicadores y añadirlo');
            } elseif (preg_match('/como veo mi sueldo/i', $message)) {
                $botman->reply('Puedes revisar tu contrato, tu nomina o preguntarle a tu superior');
            } elseif (preg_match('/un documento no me llego/i', $message)) {
                $botman->reply('Si un documento generado por otra persona no te ha llegado pidele que se asegure si lo mando a la persona correcta, si lo hizo reporta el problema con el administrador del sistema y dale la informacion del documento');
            } elseif (preg_match('/orden llevan los documentos/i', $message)) {
                $botman->reply('Los documentos se generan en el siguiente orden: 2 rendiciones de cuentas, 1 llamada de atencion y 1 acta administrativa ');
            } elseif (preg_match('/orden se generan los documentos/i', $message)) {
                $botman->reply('Los documentos se generan en el siguiente orden: 2 rendiciones de cuentas, 1 llamada de atencion y 1 acta administrativa ');
            } elseif (preg_match('/que es una llamada de atencion/i', $message)) {
                $botman->reply('Una llamada de atencion es un documento que se genera cuando un empleado ha fallado en cumplir sus indicadores en 3 o mas labores');
            } elseif (preg_match('/que es una rendicion de cuentas/i', $message)) {
                $botman->reply('Una endicion de cuentas es un documento que se genera cuando un empleado ha fallado en cumplir con un indicador en una labor');
            } elseif (preg_match('/que es un acta administrativa/i', $message)) {
                $botman->reply('Un acta administrativa es un documento que se genera cuando un empleado ha fallado en cumplir con un indicador en 4 o mas labores');
            } elseif (preg_match('/que es un puesto/i', $message)) {
                $botman->reply('Un puesto es el trabajo que tiene un empleado relacionado con sus actividades');
            } elseif (preg_match('/para que es un puesto/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/para que sirven los puestos/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/porque me pide el puesto/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/que tipos de contratos hay/i', $message)) {
                $botman->reply('4 tipos: Eventual sindicalizado, base sindicalizado, eventual confianza y base confianza');
            } elseif (preg_match('/contrato eventual sindicalizado/i', $message)) {
                $botman->reply('');
            } elseif (preg_match('/contrato base sindicalizado/i', $message)) {
                $botman->reply('');
            } elseif (preg_match('/contrato eventual confianza/i', $message)) {
                $botman->reply('');
            } elseif (preg_match('/contrato base confianza/i', $message)) {
                $botman->reply('');
            } elseif (preg_match('/modificar contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/cambiar contrato de empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/cambiar contrato del empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/para que sirve una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/ver zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que son los roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/cuales son los roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/para que sirven los roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/agregar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/crear roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/añadir roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/ver roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/eliminar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/es el RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no existe RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no hay RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no encuentro RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no existe un RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no hay un RPE/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/RPE no existe/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/RPE no encontrado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/RPE inexistente/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/para que es el boton ver perfil/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/para que es ver perfil/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que sirve ver perfil/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que sirve el boton ver perfil/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no encuentro una opcion/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/no encuentro un boton/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/cuales son los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde ver los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/RPE repetido/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es listado de usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es listado de indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es mi listado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es listado de zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta listado de usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta listado de empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta mi listado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta listado de indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta listado de puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta listado de zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta el listado de usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta el listado de empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta el listado de indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta el listado de puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde esta el listado de zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar emplados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar emplados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar indicadores/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que son las funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/sirven funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/sirve funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar funciones de puestos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar una funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar zonas/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar una zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar roles/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar un rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar actividades/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar una actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
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
