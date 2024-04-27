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
            } elseif (preg_match('/derecho.*vacaiones\s+/iu', $message)) {
                $botman->reply('Tienes derecho a un periodo de vacaciones anuales pagadas que varía dependiendo de tu antigüedad en el empleo, pero generalmente son al menos 6 días hábiles.');
            } elseif (preg_match('/renunciar\s+/i', $message)) {
                $botman->reply('Si quieres renunciar debes notificar por escrito a tu empleador con al menos 15 días de anticipación tu decisión de renunciar.');
            } elseif (preg_match('/tipos de contratos/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo reconoce contratos por tiempo indefinido, por tiempo determinado, de obra o servicio determinado, y por temporada.');
            } elseif (preg_match('/derechos.*despido injusto/i', $message)) {
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
            } elseif (preg_match('/cambiar contrato de empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/cambiar contrato del empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es una zona/iu', $message)) {
                $botman->reply('Las zonas son areas donde se ofrece un servicio y hay una sede que la atienda');
            } elseif (preg_match('/para que sirve una zona/iu', $message)) {
                $botman->reply('Las zonas sirven para identificar el área al que pertenece un empleado');
            } elseif (preg_match('/ver zonas/iu', $message)) {
                $botman->reply('Para ver las zonas registradas en el sistema hay que dirigirnos al apartado de listado de zonas en el menu de zonas. Si este menú no aparece es señal de que no se tienen los permisos suficientes para acceder');
            } elseif (preg_match('/que son los roles/iu', $message)) {
                $botman->reply('Los roles son los puestos que ocupan los usuarios del sistema. Estos determinan los permisos del respectivo usuario en el sistema.');
            } elseif (preg_match('/cuales son los roles/iu', $message)) {
                $botman->reply('Los roles actuales que maneja el sistema son: Jefatura inmediata, Jefatura zonal de proceso, Jefatura zonal de proceso de trabajo, Superintendente de zona, Subjerente de trabajo y Gerente divisional');
            } elseif (preg_match('/para que sirven los roles/iu', $message)) {
                $botman->reply('Los roles sirven para identificar el puesto del respectivo usuario y los permisos del mismo en el sistema');
            } elseif (preg_match('/ver roles/iu', $message)) {
                $botman->reply('Para ver los roles del sistema solo es necesario ir al apartado de roles en el menú de Otros. Si este menú no aparece es señal de que no se tienen los permisos suficientes para acceder');
            } elseif (preg_match('/que es RPE/iu', $message)) {
                $botman->reply('El RPE es el identificador unico de empleado que se manejan en los sistemas de la empresa');
            } elseif (preg_match('/es el RPE/iu', $message)) {
                $botman->reply('El RPE es el identificador unico de empleado que se manejan en los sistemas de la empresa');
            } elseif (preg_match('/no existe RPE/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/no hay RPE/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/no encuentro RPE/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/no existe un RPE/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/no hay un RPE/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/RPE no existe/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/RPE no encontrado/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/RPE inexistente/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/para que es.*ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/que sirve.*ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/no encuentro una opcion/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            } elseif (preg_match('/no encuentro un boton/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            } elseif (preg_match('/cuales son los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde ver los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/RPE repetido/iu', $message)) {
                $botman->reply('Si usted ha encontrado un RPE repetido, le pedimos reportarlo con su superior o el administrador del sistema para su pronta corrección');
            } elseif (preg_match('/que es listado de usuarios/iu', $message)) {
                $botman->reply('El listado de usuarios es el menú en el que se pueden visualizar todos los usuarios registrados en el sistema');
            } elseif (preg_match('/que es listado de indicadores/iu', $message)) {
                $botman->reply('El listado de indicadores es el menú en el que se pueden visualizar todos los indicadores registrados en el sistema');
            } elseif (preg_match('/que es mi listado/iu', $message)) {
                $botman->reply('Mi listado es el menú en el que se pueden visualizar todos los empleados registrados en el sistema');
            } elseif (preg_match('/que es listado de zonas/iu', $message)) {
                $botman->reply('El listado de zonas es el menú en el que se pueden visualizar todas las zonas registrados en el sistema');
            } elseif (preg_match('/donde esta listado de usuarios/iu', $message)) {
                $botman->reply('El listado de usuarios se encuentra en el menú de usuarios');
            } elseif (preg_match('/donde esta listado de empleados/iu', $message)) {
                $botman->reply('El listado de empleados se encuentra en el menú de empleados, en el área de mi listado');
            } elseif (preg_match('/donde esta mi listado/iu', $message)) {
                $botman->reply('Mi listado se encuentra en el menú de empleados');
            } elseif (preg_match('/donde esta listado de indicadores/iu', $message)) {
                $botman->reply('El listado de indicadores se encuentra en el menú de indicadores');
            } elseif (preg_match('/donde esta listado de puestos/iu', $message)) {
                $botman->reply('El listado de puestos se encuentra en el menú de puestos');
            } elseif (preg_match('/donde esta listado de zonas/iu', $message)) {
                $botman->reply('El listado de zonas se encuentra en el menú de zonas');
            } elseif (preg_match('/donde registrar usuarios/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar usuarios/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo registrar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar.*usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/donde añadir.*usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir.*usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como crear.*usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar.*usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo agregar.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar.*empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo registrar.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir.*empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como crear.*empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar.*empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo agregar.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*usuario/iu', $message)) {
                $botman->reply('Para modificar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras modificar los datos del usuario');
            } elseif (preg_match('/donde modificar.*usuario/iu', $message)) {
                $botman->reply('Para modificar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras modificar los datos del usuario');
            } elseif (preg_match('/puedo modificar.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*empleado/iu', $message)) {
                $botman->reply('Para modificar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para modificar los datos del empleado');
            } elseif (preg_match('/donde modificar.*empleado/iu', $message)) {
                $botman->reply('Para modificar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para modificar los datos del empleado');
           } elseif (preg_match('/puedo modificar.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*usuario/iu', $message)) {
                $botman->reply('Para editar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras editar los datos del usuario');
            } elseif (preg_match('/donde editar.*usuario/iu', $message)) {
                $botman->reply('Para editar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras editar los datos del usuario');
            } elseif (preg_match('/puedo editar.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*empleado/iu', $message)) {
                $botman->reply('Para editar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para editar los datos del empleado');
            } elseif (preg_match('/donde editar.*empleado/iu', $message)) {
                $botman->reply('Para editar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para editar los datos del empleado');
            } elseif (preg_match('/puedo editar.*empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/como eliminar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/puedo eliminar.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/como quitar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/puedo quitar.*usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/como eliminar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/puedo eliminar.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/como quitar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
           } elseif (preg_match('/puedo quitar.*empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*indicador/iu', $message)) {
                $botman->reply('Para crear el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como crear.*indicador/iu', $message)) {
                $botman->reply('Para crear el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo crear.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo añadir.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo registrar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo agregar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*indicador/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo registrar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo añadir.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo agregar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo crear.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/que es.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/que son.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/sirven.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones con las que debe cumplir el respectivo empleado con el puesto asignado');
            } elseif (preg_match('/sirve.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones con las que debe cumplir el respectivo empleado con el puesto asignado');
            } elseif (preg_match('/donde crear.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar funciones de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*funcion de puesto/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo agregar.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*zona/iu', $message)) {
                $botman->reply('Para crear una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como crear.*zona/iu', $message)) {
                $botman->reply('Para crear una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo crear.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*zona/iu', $message)) {
                $botman->reply('Para añadir una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como añadir.*zona/iu', $message)) {
                $botman->reply('Para añadir una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo añadir.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*zona/iu', $message)) {
                $botman->reply('Para registrar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como registrar.*zona/iu', $message)) {
                $botman->reply('Para registrar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo registrar.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*zona/iu', $message)) {
                $botman->reply('Para modificar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/como modificar.*zona/iu', $message)) {
                $botman->reply('Para modificar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/puedo modificar.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/como editar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/puedo editar.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de eliminar');
            } elseif (preg_match('/como eliminar.*zona/iu', $message)) {
                $botman->reply('Para eliminar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de eliminar');
            } elseif (preg_match('/puedo eliminar.*zona/iu', $message)) {
                $botman->reply('Para eliminar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de eliminar');
            } elseif (preg_match('/donde quitar.*zona/iu', $message)) {
                $botman->reply('Para quitar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de eliminar');
            } elseif (preg_match('/como quitar.*zona/iu', $message)) {
                $botman->reply('Para quitar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de eliminar');
            } elseif (preg_match('/puedo quitar.*zona/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar contratos/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*contrato/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*rol/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como agregar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como crear.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo crear.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como añadir.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo añadir.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como registrar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo registrar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde modificar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como modificar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo modificar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde editar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como editar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo editar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde eliminar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como eliminar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo eliminar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde quitar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/como quitar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo quitar.*actividad/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('//iu', $message)) {
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
