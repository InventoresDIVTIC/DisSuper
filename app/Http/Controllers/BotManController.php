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
            if (stripos($message, 'hola') !== false || stripos($message, 'saludo') !== false) {
                $this->askName($botman);
            } elseif (preg_match('/derechos del trabajador|derechos laborales|protección laboral/i', $message)) {
                $botman->reply('Los derechos del trabajador incluyen el salario mínimo, las prestaciones de ley, el acceso a la seguridad social, y el derecho a un ambiente laboral seguro y saludable. ¿Te gustaría saber más sobre algún derecho específico?');
            } elseif (preg_match('/salario mínimo|salario base|pago de salario/i', $message)) {
                $botman->reply('El salario mínimo es la cantidad mínima que un empleador debe pagar a sus empleados por su trabajo. El salario mínimo se establece por ley y puede variar dependiendo de la zona geográfica y el tipo de trabajo.');
            } elseif (preg_match('/prestaciones de ley|beneficios legales|derechos laborales/i', $message)) {
                $botman->reply('Las prestaciones de ley incluyen el aguinaldo, las vacaciones pagadas, la prima vacacional, y el acceso a la seguridad social. Es importante conocer y ejercer tus derechos laborales para garantizar un ambiente laboral justo y equitativo.');
            } elseif (preg_match('/seguridad social|afiliación al IMSS|derecho a la salud/i', $message)) {
                $botman->reply('Tienes derecho a la seguridad social, incluyendo la afiliación al IMSS, que te proporciona atención médica, prestaciones económicas, y otros beneficios relacionados con la salud y el bienestar.');
            } elseif (preg_match('/horas extra|trabajo extra|compensación de horas/i', $message)) {
                $botman->reply('Las horas extra deben ser compensadas de acuerdo con lo establecido en la Ley Federal del Trabajo. Asegúrate de registrar correctamente las horas extra trabajadas para recibir la compensación correspondiente.');
            } elseif (preg_match('/vacaciones pagadas|derecho a vacaciones|periodo vacacional/i', $message)) {
                $botman->reply('Tienes derecho a vacaciones pagadas de acuerdo con lo establecido en la Ley Federal del Trabajo. Asegúrate de programar tus vacaciones con anticipación y cumplir con los requisitos para acceder a este beneficio.');
            } elseif (preg_match('/prima vacacional|pago de vacaciones|compensación de vacaciones/i', $message)) {
                $botman->reply('Además del salario durante las vacaciones, tienes derecho a recibir una prima vacacional equivalente al 25% de tu salario diario. Asegúrate de recibir este pago junto con tu salario antes de salir de vacaciones.');
            } elseif (preg_match('/aguinaldo|pago de aguinaldo|derecho al aguinaldo/i', $message)) {
                $botman->reply('Tienes derecho a recibir aguinaldo cada año, que debe ser equivalente a al menos 15 días de salario. Asegúrate de recibir tu aguinaldo antes del 20 de diciembre de cada año.');
            } elseif (preg_match('/indemnización|liquidación|derecho a indemnización/i', $message)) {
                $botman->reply('En caso de terminación de la relación laboral, tienes derecho a recibir una indemnización o liquidación de acuerdo con lo establecido en la Ley Federal del Trabajo y en tu contrato laboral.');
            } elseif (preg_match('/permisos de maternidad|licencia de maternidad|derechos de maternidad/i', $message)) {
                $botman->reply('Las trabajadoras tienen derecho a una licencia de maternidad de 12 semanas con goce de sueldo. Durante este período, la trabajadora tiene derecho a la atención médica necesaria y a conservar su empleo.');
            } elseif (preg_match('/permisos de paternidad|licencia de paternidad|derechos de paternidad/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a una licencia de paternidad de 5 días con goce de sueldo. Durante este período, el trabajador tiene derecho a la atención médica necesaria y a conservar su empleo.');
            } elseif (preg_match('/derechos sindicales|libertad sindical|afiliación sindical/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a formar parte de un sindicato, a participar en actividades sindicales, y a la negociación colectiva para la mejora de las condiciones de trabajo. Es importante conocer y ejercer tus derechos sindicales.');
            } elseif (preg_match('/igualdad de género|no discriminación|derechos humanos/i', $message)) {
                $botman->reply('Todos los trabajadores tienen derecho a la igualdad de oportunidades y de trato en el ámbito laboral, sin discriminación por motivos de género, edad, discapacidad, condición social, religión, o cualquier otra condición personal o social.');
            } elseif (preg_match('/seguridad e higiene|condiciones de trabajo seguras|protección laboral/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a un ambiente de trabajo seguro y saludable, con las condiciones necesarias para prevenir accidentes y enfermedades relacionadas con el trabajo. Es importante seguir los protocolos de seguridad e higiene.');
            } elseif (preg_match('/derecho a la capacitación|formación profesional|desarrollo laboral/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a recibir capacitación y formación profesional continua para mejorar sus habilidades y competencias laborales, de acuerdo con las necesidades del puesto de trabajo y las políticas de la empresa.');
            } elseif (preg_match('/derecho a la privacidad|protección de datos personales|confidencialidad/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a la privacidad y a la protección de sus datos personales en el ámbito laboral. La empresa debe respetar la confidencialidad de la información personal y profesional de los trabajadores.');
            } elseif (preg_match('/derecho a la libertad de expresión|opinión libre|comunicación abierta/i', $message)) {
                $botman->reply('Los trabajadores tienen derecho a la libertad de expresión y a la opinión libre en el ámbito laboral, siempre y cuando se respeten los derechos y las opiniones de los demás y se mantenga un ambiente de trabajo respetuoso y colaborativo.');
            } elseif (preg_match('/código de ética|normas de conducta|ética laboral/i', $message)) {
                $botman->reply('El código de ética de la Comisión Federal de Electricidad (CFE) establece los principios y valores que guían el comportamiento y las decisiones de los empleados de la empresa. ¿Te gustaría saber más sobre algún aspecto específico del código de ética de la CFE?');
            } elseif (preg_match('/integridad|honestidad|transparencia/i', $message)) {
                $botman->reply('La integridad, la honestidad y la transparencia son valores fundamentales en el código de ética de la CFE. Los empleados deben actuar con ética y responsabilidad en todas sus actividades laborales y relaciones profesionales.');
            } elseif (preg_match('/respeto|tolerancia|diversidad/i', $message)) {
                $botman->reply('El respeto, la tolerancia y la valoración de la diversidad son principios importantes en el código de ética de la CFE. Los empleados deben tratar a sus colegas, clientes y stakeholders con respeto y cortesía, independientemente de sus diferencias.');
            } elseif (preg_match('/compromiso|responsabilidad|cumplimiento/i', $message)) {
                $botman->reply('El compromiso, la responsabilidad y el cumplimiento son valores esenciales en el código de ética de la CFE. Los empleados deben cumplir con sus obligaciones laborales, respetar las políticas y procedimientos de la empresa, y actuar con profesionalismo y dedicación.');
            } elseif (preg_match('/ética empresarial|gestión ética|prácticas empresariales responsables/i', $message)) {
                $botman->reply('La ética empresarial, la gestión ética y las prácticas empresariales responsables son aspectos clave en el código de ética de la CFE. La empresa se compromete a actuar de manera ética y responsable en todas sus operaciones y decisiones estratégicas.');
            } elseif (preg_match('/transparencia|rendición de cuentas|ética de la información/i', $message)) {
                $botman->reply('La transparencia, la rendición de cuentas y la ética de la información son principios fundamentales en el código de ética de la CFE. La empresa se compromete a proporcionar información veraz, oportuna y confiable a sus stakeholders y a actuar con transparencia en todas sus operaciones.');
            } elseif (preg_match('/conflicto de intereses|ética profesional|gestión de conflictos/i', $message)) {
                $botman->reply('La prevención y gestión de conflictos de intereses, la ética profesional y la gestión de conflictos son aspectos importantes en el código de ética de la CFE. Los empleados deben evitar situaciones que puedan generar un conflicto de intereses y actuar con ética y profesionalismo en todas sus decisiones y acciones.');
            } elseif (preg_match('/sostenibilidad|responsabilidad ambiental|desarrollo sostenible/i', $message)) {
                $botman->reply('La sostenibilidad, la responsabilidad ambiental y el desarrollo sostenible son valores prioritarios en el código de ética de la CFE. La empresa se compromete a promover prácticas empresariales sostenibles, proteger el medio ambiente y contribuir al desarrollo económico, social y ambiental de las comunidades donde opera.');
            } elseif (preg_match('/compliance|cumplimiento normativo|gestión de riesgos/i', $message)) {
                $botman->reply('El cumplimiento normativo, la gestión de riesgos y el compliance son aspectos clave en el código de ética de la CFE. La empresa se compromete a cumplir con las leyes, regulaciones y estándares aplicables, gestionar proactivamente los riesgos asociados a sus operaciones y promover una cultura de cumplimiento y ética empresarial.');
            }
            
            
            
            
            elseif (preg_match('/seguridad y salud laboral|prevención de riesgos laborales|bienestar de los empleados/i', $message)) {
                $botman->reply('La seguridad y salud laboral, la prevención de riesgos laborales y el bienestar de los empleados son aspectos prioritarios en el código de ética de la CFE. La empresa se compromete a proporcionar un ambiente de trabajo seguro y saludable, implementar medidas de prevención de riesgos y promover el bienestar físico y emocional de sus empleados.');
            } elseif (preg_match('/ética en la contratación|procesos de selección justos|igualdad de oportunidades/i', $message)) {
                $botman->reply('La ética en la contratación, los procesos de selección justos y la igualdad de oportunidades son principios esenciales en el código de ética de la CFE. La empresa se compromete a promover prácticas de contratación éticas, transparentes y basadas en el mérito, respetando la igualdad de oportunidades y la diversidad.');
            } elseif (preg_match('/normas laborales|reglamento interno|políticas de trabajo/i', $message)) {
                $botman->reply('Los trabajadores de la CFE y cualquier trabajador en general deben cumplir con las normas laborales, el reglamento interno y las políticas de trabajo establecidas por la empresa. ¿Te gustaría saber más sobre alguna norma específica o política de trabajo?');
            } elseif (preg_match('/puntualidad|asistencia|horarios de trabajo/i', $message)) {
                $botman->reply('La puntualidad, la asistencia y el cumplimiento de los horarios de trabajo son normas fundamentales que deben cumplir los trabajadores. Es importante llegar a tiempo, cumplir con las horas de trabajo establecidas y registrar correctamente la asistencia.');
            } elseif (preg_match('/vestimenta|imagen personal|código de vestimenta/i', $message)) {
                $botman->reply('Los trabajadores deben seguir el código de vestimenta o la normativa de imagen personal establecida por la empresa. Es importante vestir de manera adecuada y profesional, respetando las normas de vestimenta y presentación personal.');
            } elseif (preg_match('/conducta|comportamiento|ética profesional/i', $message)) {
                $botman->reply('Los trabajadores deben mantener una conducta profesional, un comportamiento ético y respetuoso, y cumplir con las normas de conducta y comportamiento establecidas por la empresa. Es importante actuar con integridad, honestidad y responsabilidad en todas las actividades laborales y relaciones profesionales.');
            } elseif (preg_match('/seguridad laboral|protección personal|normas de seguridad/i', $message)) {
                $botman->reply('Los trabajadores deben cumplir con las normas de seguridad laboral, utilizar el equipo de protección personal adecuado, y seguir los protocolos de seguridad establecidos por la empresa. Es importante mantener un ambiente de trabajo seguro y prevenir accidentes y riesgos laborales.');
            } elseif (preg_match('/calidad del trabajo|normas de calidad|procesos de trabajo/i', $message)) {
                $botman->reply('Los trabajadores deben mantener altos estándares de calidad en su trabajo, seguir las normas de calidad y los procedimientos de trabajo establecidos por la empresa. Es importante cumplir con las especificaciones técnicas, los estándares de calidad y los requisitos del cliente o usuario.');
            } elseif (preg_match('/uso de recursos|ahorro de energía|reciclaje/i', $message)) {
                $botman->reply('Los trabajadores deben utilizar los recursos de manera eficiente y responsable, promover el ahorro de energía, el uso sostenible de los recursos naturales, y participar en las iniciativas de reciclaje y gestión ambiental de la empresa.');
            } elseif (preg_match('/confidencialidad|protección de datos|información sensible/i', $message)) {
                $botman->reply('Los trabajadores deben mantener la confidencialidad, proteger los datos personales y la información sensible de la empresa, y cumplir con las normas de protección de datos y seguridad de la información establecidas por la empresa y la legislación aplicable.');
            } elseif (preg_match('/comunicación interna|colaboración|trabajo en equipo/i', $message)) {
                $botman->reply('Los trabajadores deben promover la comunicación interna, colaborar con sus colegas, y trabajar en equipo para lograr los objetivos y metas de la empresa. Es importante compartir información, ideas y recursos de manera efectiva y constructiva.');
            } elseif (preg_match('/formación y desarrollo|capacitación|aprendizaje continuo/i', $message)) {
                $botman->reply('Los trabajadores deben participar en la formación y desarrollo profesional, recibir capacitación y promover el aprendizaje continuo para mejorar sus habilidades y competencias laborales, y contribuir al crecimiento y éxito de la empresa.');
            } elseif (preg_match('/cumplimiento de leyes|normativa legal|regulaciones/i', $message)) {
                $botman->reply('Los trabajadores deben cumplir con las leyes, normativa legal, regulaciones y estándares aplicables a su trabajo, y seguir las políticas y procedimientos de cumplimiento establecidos por la empresa. Es importante actuar con responsabilidad, integridad y ética profesional en todas las actividades laborales y relaciones comerciales.');
            } elseif (preg_match('/mecanismos de seguridad|seguridad laboral|protección laboral/i', $message)) {
                $botman->reply('Los mecanismos de seguridad en el trabajo incluyen protocolos de seguridad, equipos de protección personal, capacitación en seguridad, inspecciones de seguridad y programas de prevención de riesgos laborales.');
            } elseif (preg_match('/derechos de empleados|derechos laborales|protección de derechos/i', $message)) {
                $botman->reply('Los derechos de los empleados incluyen el derecho a un ambiente de trabajo seguro y saludable, el derecho a la igualdad de oportunidades y trato justo, el derecho a la privacidad y protección de datos personales, y el derecho a la libertad sindical y negociación colectiva.');
            } elseif (preg_match('/equipos de protección personal|EPP|uso de EPP/i', $message)) {
                $botman->reply('Los equipos de protección personal (EPP) son dispositivos, prendas o equipos diseñados para proteger al trabajador contra riesgos laborales. Es obligatorio utilizar EPP adecuados según el tipo de trabajo y los riesgos asociados.');
            } elseif (preg_match('/capacitación en seguridad|formación en prevención de riesgos|cursos de seguridad laboral/i', $message)) {
                $botman->reply('La capacitación en seguridad laboral es fundamental para proporcionar a los trabajadores los conocimientos y habilidades necesarios para identificar, prevenir y responder adecuadamente a los riesgos laborales. Los trabajadores deben recibir formación regular en seguridad y salud en el trabajo.');
            } elseif (preg_match('/protocolos de emergencia|plan de emergencia|evacuación en caso de emergencia/i', $message)) {
                $botman->reply('Los protocolos de emergencia y el plan de emergencia son procedimientos establecidos para responder de manera organizada y efectiva a situaciones de emergencia, como incendios, accidentes o desastres naturales. Los trabajadores deben conocer y seguir los protocolos de emergencia y participar en simulacros de evacuación.');
            } elseif (preg_match('/inspecciones de seguridad|auditorías de seguridad|evaluaciones de riesgos/i', $message)) {
                $botman->reply('Las inspecciones de seguridad, las auditorías de seguridad y las evaluaciones de riesgos son herramientas utilizadas para identificar, evaluar y controlar los riesgos laborales. Es importante realizar inspecciones periódicas, auditorías de seguridad y evaluaciones de riesgos para garantizar un ambiente de trabajo seguro y saludable.');
            } elseif (preg_match('/prevención de riesgos laborales|programas de prevención|gestión de riesgos/i', $message)) {
                $botman->reply('La prevención de riesgos laborales incluye la identificación, evaluación y control de los riesgos laborales para prevenir accidentes y enfermedades ocupacionales. Los programas de prevención de riesgos laborales y la gestión de riesgos son fundamentales para promover un ambiente de trabajo seguro y saludable.');
            } elseif (preg_match('/denuncia de riesgos|reporte de incidentes|comunicación de riesgos/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho y la responsabilidad de denunciar los riesgos laborales, reportar incidentes y comunicar los riesgos a la empresa para que se tomen las medidas preventivas necesarias. Es importante promover una cultura de reporte y comunicación de riesgos en la empresa.');
            } elseif (preg_match('/derecho a la información|acceso a la información|comunicación transparente/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho a recibir información clara, precisa y oportuna sobre las condiciones de trabajo, los riesgos laborales, las medidas de seguridad y salud, y los derechos y responsabilidades en materia de prevención de riesgos laborales. Es importante promover una comunicación transparente y accesible.');
            } elseif (preg_match('/protección de datos personales|privacidad del empleado|confidencialidad/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho a la protección de sus datos personales, la privacidad en el ámbito laboral y la confidencialidad de la información personal y profesional. La empresa debe cumplir con las leyes de protección de datos y garantizar la seguridad y privacidad de la información.');
            }





            elseif (preg_match('/derecho a la salud|atención médica|seguro de gastos médicos/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho a la salud, la atención médica adecuada y el acceso a los servicios de salud. La empresa debe proporcionar un seguro de gastos médicos, servicios médicos ocupacionales y programas de bienestar para promover la salud y el bienestar de los empleados.');
            }  elseif (preg_match('/igualdad de oportunidades|no discriminación|diversidad e inclusión/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho a la igualdad de oportunidades, el trato justo y la no discriminación por motivos de género, edad, raza, religión, discapacidad o cualquier otra condición personal o social. La empresa debe promover la diversidad e inclusión y combatir cualquier forma de discriminación.');
            } elseif (preg_match('/derecho a la libertad sindical|afiliación sindical|negociación colectiva/i', $message)) {
                $botman->reply('Los trabajadores tienen el derecho a la libertad sindical, la afiliación sindical y la negociación colectiva para la protección de sus intereses laborales y la mejora de las condiciones de trabajo. La empresa debe respetar y garantizar el ejercicio de estos derechos y promover un diálogo constructivo con los sindicatos.');
            } elseif (preg_match('/cumplimiento de normativas|regulaciones|leyes laborales/i', $message)) {
                $botman->reply('Los trabajadores y la empresa deben cumplir con las normativas, regulaciones y leyes laborales aplicables, incluyendo las disposiciones en materia de seguridad y salud en el trabajo, derechos laborales, condiciones de trabajo y relaciones laborales. Es importante conocer y cumplir con las obligaciones legales y promover una cultura de cumplimiento.');
            } elseif (preg_match('/Ley Federal del Trabajo|LFT|legislación laboral/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo es la normativa que regula las relaciones laborales en México, estableciendo los derechos y obligaciones de los trabajadores y empleadores. Es fundamental conocer y cumplir con la Ley Federal del Trabajo para garantizar un ambiente laboral justo y equitativo.');
            } elseif (preg_match('/contrato de trabajo|tipos de contratos|condiciones laborales/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo establece las bases para la formalización del contrato de trabajo, los tipos de contratos laborales, las condiciones de trabajo y los derechos y obligaciones de los trabajadores y empleadores. Es importante contar con un contrato de trabajo escrito y conocer las condiciones laborales establecidas en la Ley.');
            } elseif (preg_match('/jornada laboral|horarios de trabajo|descansos|horario/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo regula la jornada laboral, los horarios de trabajo, los descansos, las horas extraordinarias y los días de descanso obligatorio. Los trabajadores tienen derecho a una jornada laboral justa, descansos adecuados y compensación por horas extraordinarias.');
            } elseif (preg_match('/salario mínimo|salarios|pagos laborales/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo establece el salario mínimo, las formas de pago, las prestaciones laborales y los conceptos salariales. Los trabajadores tienen derecho a recibir un salario justo, prestaciones de ley y pagos laborales oportunos y completos.');
            } elseif (preg_match('/aguinaldo|vacaciones|prestaciones de ley/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo establece el derecho de los trabajadores al aguinaldo, las vacaciones pagadas, la prima vacacional y otras prestaciones de ley. Los trabajadores tienen derecho a disfrutar de estos beneficios de acuerdo con lo establecido en la Ley.');
            } elseif (preg_match('/derechos sindicales|libertad sindical|negociación colectiva/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo reconoce y protege los derechos sindicales, incluyendo la libertad sindical, el derecho a la afiliación sindical y la negociación colectiva. Los trabajadores tienen el derecho de formar, afiliarse a sindicatos y participar en actividades sindicales para la defensa de sus intereses laborales.');
            } elseif (preg_match('/despido|terminación de contrato|liquidación/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo establece las causas, procedimientos y derechos en caso de despido o terminación de contrato laboral, incluyendo la indemnización, la liquidación y los derechos del trabajador. Es importante conocer y respetar los derechos y procedimientos establecidos en la Ley en caso de despido o terminación de contrato.');
            } elseif (preg_match('/seguridad e higiene laboral|prevención de riesgos|condiciones de trabajo/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo regula la seguridad e higiene laboral, la prevención de riesgos laborales y las condiciones de trabajo. Los empleadores tienen la obligación de proporcionar un ambiente de trabajo seguro y saludable, implementar medidas de prevención de riesgos y cumplir con los estándares de seguridad e higiene establecidos en la Ley.');
            } elseif (preg_match('/derechos de maternidad|licencia de maternidad|protección a la maternidad/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo protege los derechos de maternidad, incluyendo la licencia de maternidad, el descanso prenatal y postnatal, y la protección contra el despido por embarazo o maternidad. Las trabajadoras tienen derecho a disfrutar de estos beneficios y protecciones durante el embarazo y después del parto.');
            } elseif (preg_match('/derechos de paternidad|licencia de paternidad|protección a la paternidad/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo reconoce los derechos de paternidad, incluyendo la licencia de paternidad y la protección contra el despido por paternidad. Los trabajadores tienen derecho a disfrutar de estos beneficios y protecciones durante el nacimiento o adopción de un hijo.');
            } elseif (preg_match('/acoso laboral|acoso sexual|violencia laboral/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo prohíbe el acoso laboral, el acoso sexual y la violencia laboral, estableciendo medidas de prevención, atención y sanción. Los trabajadores tienen derecho a un ambiente laboral libre de acoso y violencia, y las empresas deben promover una cultura de respeto y tolerancia.');
            } elseif (preg_match('/discriminación laboral|igualdad de género|inclusión laboral/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo prohíbe la discriminación laboral, promueve la igualdad de género, la diversidad e inclusión en el ámbito laboral. Los trabajadores tienen derecho a un trato igualitario y justo, y las empresas deben combatir cualquier forma de discriminación y promover la igualdad de oportunidades.');
            } elseif (preg_match('/derechos de los trabajadores migrantes|protección a trabajadores migrantes|trabajo digno/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo protege los derechos de los trabajadores migrantes, incluyendo la protección contra la explotación laboral, el tráfico de personas y la discriminación. Los trabajadores migrantes tienen derecho a un trabajo digno, condiciones laborales justas y protección contra cualquier forma de abuso o explotación.');
            } elseif (preg_match('/cumplimiento de obligaciones fiscales|obligaciones patronales|contribuciones laborales/i', $message)) {
                $botman->reply('La Ley Federal del Trabajo establece las obligaciones fiscales, patronales y las contribuciones laborales que deben cumplir los empleadores, incluyendo el pago de impuestos, cuotas obrero-patronales, aportaciones al INFONAVIT, SAR, entre otros. Los empleadores tienen la responsabilidad de cumplir con estas obligaciones y garantizar los derechos de los trabajadores.');
            } elseif (preg_match('/obligaciones del trabajador|deberes del trabajador|responsabilidades laborales/i', $message)) {
                $botman->reply('Las obligaciones del trabajador incluyen cumplir con las normas y políticas de la empresa, realizar sus tareas y responsabilidades de manera diligente y eficiente, respetar los horarios de trabajo y cumplir con las obligaciones establecidas en el contrato de trabajo y la Ley Federal del Trabajo.');
            } elseif (preg_match('/cumplimiento de horarios|asistencia puntual|jornada laboral/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de cumplir con los horarios de trabajo, llegar puntualmente a su puesto laboral y cumplir con la jornada laboral establecida en el contrato de trabajo o la normativa laboral.');
            } elseif (preg_match('/realización de tareas|desempeño laboral|productividad/i', $message)) {
                $botman->reply('El trabajador debe realizar sus tareas y responsabilidades laborales de manera diligente, eficiente y profesional, contribuyendo al logro de los objetivos y metas de la empresa y manteniendo un buen desempeño laboral.');
            } elseif (preg_match('/cumplimiento de normas|políticas de la empresa|reglamento interno/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de cumplir con las normas, políticas y procedimientos establecidos por la empresa, incluyendo el reglamento interno de trabajo, las políticas de seguridad e higiene laboral y las normativas internas.');
            } elseif (preg_match('/respeto a colegas|trabajo en equipo|ambiente laboral/i', $message)) {
                $botman->reply('El trabajador debe respetar a sus colegas, colaborar en el trabajo en equipo y contribuir a mantener un ambiente laboral armonioso, respetuoso y colaborativo.');
            } elseif (preg_match('/uso adecuado de recursos|cuidado de herramientas|conservación de materiales/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de utilizar adecuadamente los recursos, herramientas y materiales de trabajo proporcionados por la empresa, cuidar su conservación y evitar cualquier desperdicio o uso indebido.');
            } elseif (preg_match('/confidencialidad|protección de datos|información sensible/i', $message)) {
                $botman->reply('El trabajador debe mantener la confidencialidad y proteger la información sensible, datos personales y secretos comerciales de la empresa, evitando su divulgación o uso indebido.');
            }
            
            
            
            
            elseif (preg_match('/participación en capacitaciones|formación continua|actualización profesional/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de participar en las capacitaciones, cursos de formación y programas de actualización profesional proporcionados por la empresa para mejorar sus habilidades y competencias laborales.');
            } elseif (preg_match('/cumplimiento de obligaciones fiscales|declaración de impuestos|contribuciones laborales/i', $message)) {
                $botman->reply('El trabajador debe cumplir con sus obligaciones fiscales, incluyendo la declaración de impuestos, el pago de contribuciones laborales y otras obligaciones fiscales establecidas por la legislación aplicable.');
            } elseif (preg_match('/comunicación con la empresa|reporte de ausencias|notificación de cambios/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de mantener una comunicación fluida y oportuna con la empresa, notificar cualquier cambio en sus datos personales, reportar ausencias o incidencias laborales y cumplir con los procedimientos establecidos por la empresa.');
            } elseif (preg_match('/uso adecuado de uniformes|imagen personal|código de vestimenta/i', $message)) {
                $botman->reply('El trabajador debe utilizar adecuadamente el uniforme, vestimenta o equipo de protección personal proporcionado por la empresa, mantener una imagen personal profesional y cumplir con el código de vestimenta o normativa de imagen personal establecida.');
            } elseif (preg_match('/ética laboral|integridad|honestidad/i', $message)) {
                $botman->reply('El trabajador debe actuar con ética, integridad y honestidad en todas sus actividades laborales, cumpliendo con los principios de conducta profesional, respetando los valores de la empresa y actuando con transparencia y responsabilidad.');
            } elseif (preg_match('/prevención de riesgos laborales|seguridad e higiene|protección personal/i', $message)) {
                $botman->reply('El trabajador tiene la obligación de cumplir con las normas de seguridad e higiene laboral, utilizar adecuadamente el equipo de protección personal, participar en la prevención de riesgos laborales y seguir las instrucciones y procedimientos de seguridad establecidos por la empresa.');
            } elseif (preg_match('/cumplimiento de objetivos|metas laborales|rendimiento/i', $message)) {
                $botman->reply('El trabajador debe esforzarse por cumplir con los objetivos, metas laborales y estándares de rendimiento establecidos por la empresa, contribuyendo al éxito y crecimiento de la organización.');
            } elseif (preg_match('/respeto a la autoridad|obediencia laboral|jerarquía organizacional/i', $message)) {
                $botman->reply('El trabajador debe respetar la autoridad, acatar las órdenes y directrices de sus superiores y respetar la jerarquía organizacional, manteniendo una relación laboral cordial, profesional y respetuosa con sus jefes y colegas.');
            } elseif (preg_match('/mantenimiento de herramientas|cuidado de equipos|conservación de instalaciones/i', $message)) {
                $botman->reply('El trabajador tiene la responsabilidad de cuidar y mantener en buen estado las herramientas, equipos, maquinaria e instalaciones de trabajo proporcionados por la empresa, reportar cualquier defecto o fallo y colaborar en su conservación y mantenimiento.');
            } elseif (preg_match('/contribución a la mejora continua|innovación|creatividad/i', $message)) {
                $botman->reply('El trabajador debe contribuir a la mejora continua, promover la innovación y la creatividad en el ámbito laboral, proponer ideas y soluciones para optimizar los procesos de trabajo y contribuir al desarrollo y éxito de la empresa.');
            } elseif (preg_match('/Procedimientos de CFE|Protocolos de CFE|Normativas de CFE/i', $message)) {
                $botman->reply('La Comisión Federal de Electricidad (CFE) cuenta con diversos procedimientos y protocolos para garantizar la seguridad, eficiencia y calidad en la prestación de servicios eléctricos. Es importante conocer y seguir los procedimientos y protocolos establecidos por la CFE para asegurar un servicio eléctrico confiable y seguro.');
            } elseif (preg_match('/Instalaciones eléctricas|mantenimiento de redes|infraestructura eléctrica/i', $message)) {
                $botman->reply('La CFE tiene procedimientos para el diseño, construcción, operación y mantenimiento de instalaciones eléctricas, redes de distribución y infraestructura eléctrica, garantizando la seguridad, eficiencia y calidad en la prestación de servicios eléctricos.');
            } elseif (preg_match('/Atención a clientes|reclamaciones|consultas/i', $message)) {
                $botman->reply('La CFE cuenta con procedimientos para la atención a clientes, gestión de reclamaciones, consultas y solicitud de servicios, asegurando una atención oportuna, eficiente y satisfactoria a los usuarios.');
            } elseif (preg_match('/Prevención de riesgos|seguridad e higiene|protección civil/i', $message)) {
                $botman->reply('La CFE tiene protocolos de seguridad e higiene laboral, prevención de riesgos eléctricos, protección civil y respuesta a emergencias, garantizando la protección de los trabajadores, usuarios y comunidades ante posibles riesgos y contingencias.');
            } elseif (preg_match('/Facturación y pagos|tarifas eléctricas|cálculo de consumo/i', $message)) {
                $botman->reply('La CFE tiene procedimientos para la facturación y pagos de servicios eléctricos, establecimiento de tarifas eléctricas, cálculo de consumo y gestión de cobros, asegurando una facturación precisa, transparente y justa.');
            } elseif (preg_match('/Gestión de energía|eficiencia energética|ahorro de energía/i', $message)) {
                $botman->reply('La CFE cuenta con protocolos para la gestión de energía, promoción de la eficiencia energética, fomento del ahorro de energía y desarrollo de proyectos de energías renovables, contribuyendo a la sustentabilidad y cuidado del medio ambiente.');
            } elseif (preg_match('/Conexiones eléctricas|alta de servicio|modificaciones de contrato/i', $message)) {
                $botman->reply('La CFE tiene procedimientos para las conexiones eléctricas, solicitud de alta de servicio, modificación de contrato, cambio de tarifa y servicios adicionales, garantizando una gestión eficiente y oportuna de las solicitudes de los usuarios.');
            } elseif (preg_match('/Normativas técnicas|estándares de calidad|regulaciones eléctricas/i', $message)) {
                $botman->reply('La CFE sigue normativas técnicas, estándares de calidad, regulaciones eléctricas y mejores prácticas internacionales en la prestación de servicios eléctricos, asegurando la conformidad, confiabilidad y calidad en sus operaciones y servicios.');
            } elseif (preg_match('/Innovación tecnológica|tecnologías emergentes|modernización/i', $message)) {
                $botman->reply('La CFE promueve la innovación tecnológica, adopta tecnologías emergentes y realiza la modernización de sus infraestructuras y sistemas eléctricos, buscando mejorar la eficiencia operativa, calidad del servicio y satisfacción de los usuarios.');
            } elseif (preg_match('/Educación y cultura energética|capacitación|conciencia ambiental/i', $message)) {
                $botman->reply('La CFE realiza programas de educación y cultura energética, ofrece capacitación a trabajadores y promueve la conciencia ambiental, fomentando el uso responsable de la energía, prácticas sostenibles y participación ciudadana en temas energéticos.');
            } elseif (preg_match('/Inspecciones y auditorías|cumplimiento normativo|calidad del servicio/i', $message)) {
                $botman->reply('La CFE realiza inspecciones y auditorías para verificar el cumplimiento normativo, evaluar la calidad del servicio eléctrico, identificar oportunidades de mejora y asegurar el cumplimiento de los procedimientos y protocolos establecidos.');
            } elseif (preg_match('/Comunicación y divulgación|información al público|transparencia/i', $message)) {
                $botman->reply('La CFE mantiene una comunicación y divulgación activa, proporciona información al público sobre sus servicios, tarifas, proyectos y actividades, y promueve la transparencia, rendición de cuentas y participación ciudadana en su gestión.');
            } elseif (preg_match('/Gestión de recursos humanos|capacitación de personal|desarrollo profesional/i', $message)) {
                $botman->reply('La CFE tiene procedimientos para la gestión de recursos humanos, capacitación de personal, desarrollo profesional y bienestar laboral, garantizando la formación, motivación y desarrollo de los trabajadores para la mejora continua y excelencia en el servicio.');
            } elseif (preg_match('/Seguridad laboral|Salud ocupacional|Prevención de riesgos/i', $message)) {
                $botman->reply('La seguridad laboral es fundamental para proteger la integridad física y la salud de los trabajadores en el entorno laboral. Se refiere a las medidas y acciones preventivas para identificar, evaluar y controlar los riesgos laborales, garantizando condiciones de trabajo seguras y saludables.');
            } elseif (preg_match('/Equipos de protección individual|EPI|Elementos de seguridad/i', $message)) {
                $botman->reply('Los equipos de protección individual (EPI) son dispositivos, herramientas o prendas de vestir diseñados para proteger a los trabajadores contra riesgos específicos en el desempeño de sus actividades laborales, como cascos, guantes, gafas, calzado de seguridad, entre otros.');
            }
            
            
            
            
            
            elseif (preg_match('/Normativas de seguridad|Legislación laboral|Regulaciones de seguridad/i', $message)) {
                $botman->reply('La normativa de seguridad laboral incluye leyes, reglamentos, normas y directrices establecidas por las autoridades competentes para regular y promover la seguridad y salud en el trabajo, estableciendo obligaciones y responsabilidades para empleadores y trabajadores.');
            } elseif (preg_match('/Evaluación de riesgos|Identificación de peligros|Análisis de riesgos/i', $message)) {
                $botman->reply('La evaluación de riesgos laborales es un proceso sistemático para identificar, evaluar y priorizar los peligros y riesgos asociados a las actividades laborales, implementando medidas preventivas y de control para eliminar o reducir los riesgos y garantizar un ambiente de trabajo seguro.');
            }  
            elseif (preg_match('/Capacitación en seguridad|Formación en prevención|Entrenamiento de seguridad/i', $message)) {
               $botman->reply('La capacitación en seguridad laboral es esencial para proporcionar a los trabajadores los conocimientos, habilidades y competencias necesarias para identificar, prevenir y manejar los riesgos laborales, promoviendo una cultura de seguridad y fomentando prácticas seguras en el trabajo.');
           } elseif (preg_match('/Señalización de seguridad|Indicadores de seguridad|Marcado de áreas peligrosas/i', $message)) {
               $botman->reply('La señalización de seguridad es fundamental para informar, advertir y guiar a los trabajadores sobre los riesgos, prohibiciones, obligaciones y medidas de seguridad en el entorno laboral, utilizando señales, colores, pictogramas y mensajes visuales para mejorar la orientación y seguridad.');
           } elseif (preg_match('/Emergencias laborales|Planes de emergencia|Procedimientos de evacuación/i', $message)) {
               $botman->reply('Los planes de emergencia y los procedimientos de evacuación son fundamentales para preparar y responder de manera efectiva ante situaciones de emergencia, como incendios, accidentes, desastres naturales, garantizando la seguridad y protección de los trabajadores, usuarios y instalaciones.');
           } elseif (preg_match('/Herramientas eléctricas|Prevención de riesgos eléctricos|Normas eléctricas/i', $message)) {
               $botman->reply('La prevención de riesgos eléctricos es esencial para garantizar la seguridad de los trabajadores que realizan actividades con herramientas, equipos y instalaciones eléctricas, cumpliendo con las normas eléctricas, medidas de protección, y utilizando equipos y herramientas adecuadas.');
           } elseif (preg_match('/Manipulación de sustancias peligrosas|Almacenamiento de químicos|Protocolos de seguridad química/i', $message)) {
               $botman->reply('La manipulación de sustancias peligrosas requiere el cumplimiento de protocolos de seguridad química, medidas de prevención, almacenamiento adecuado, uso de equipos de protección y capacitación específica para garantizar la seguridad y protección de los trabajadores y el medio ambiente.');
           } elseif (preg_match('/Ergonomía laboral|Adaptación del puesto de trabajo|Prevención de lesiones musculoesqueléticas/i', $message)) {
               $botman->reply('La ergonomía laboral se enfoca en el diseño, adaptación y organización del puesto de trabajo para minimizar los riesgos de lesiones musculoesqueléticas, mejorar la comodidad, bienestar y eficiencia de los trabajadores, y prevenir los trastornos músculo-esqueléticos relacionados con el trabajo.');
           } elseif (preg_match('/Inspecciones de seguridad|Auditorías de seguridad|Revisiones periódicas/i', $message)) {
               $botman->reply('Las inspecciones de seguridad y las auditorías de seguridad son herramientas de gestión para verificar el cumplimiento de las normas, identificar deficiencias, oportunidades de mejora, evaluar el desempeño en seguridad y promover la mejora continua en el sistema de gestión de seguridad laboral.');
           } elseif (preg_match('/Trabajo en alturas|Prevención de caídas|Equipos de protección contra caídas/i', $message)) {
               $botman->reply('El trabajo en alturas presenta riesgos significativos de caídas, por lo que es fundamental implementar medidas de prevención de caídas, utilizar equipos de protección contra caídas, como arneses, líneas de vida, barandillas, y seguir protocolos de seguridad específicos para trabajos en alturas.');
           } elseif (preg_match('/Maquinaria y equipos de trabajo|Inspección de maquinaria|Capacitación en uso seguro/i', $message)) {
               $botman->reply('El uso seguro de maquinaria y equipos de trabajo requiere la implementación de medidas de seguridad, inspecciones periódicas, mantenimiento adecuado, capacitación en el uso seguro y manejo de la maquinaria, y el uso de equipos de protección personal para prevenir accidentes y lesiones.');
           } elseif (preg_match('/Trabajos en espacios confinados|Protocolos de entrada y salida|Equipos de respiración autónoma/i', $message)) {
               $botman->reply('Los trabajos en espacios confinados presentan riesgos de asfixia, intoxicación, atrapamiento, por lo que es esencial implementar protocolos de entrada y salida segura, utilizar equipos de respiración autónoma, monitorear la atmósfera, capacitar al personal y seguir medidas de seguridad específicas.');
           } elseif (preg_match('/Protección auditiva|Exposición a ruido|Equipos de protección auditiva/i', $message)) {
               $botman->reply('La protección auditiva es esencial para prevenir la exposición a niveles de ruido elevados que pueden causar daños auditivos y problemas de salud, por lo que es necesario identificar las fuentes de ruido, evaluar los niveles de exposición, utilizar equipos de protección auditiva y ofrecer capacitación en prevención de riesgos auditivos.');
           } elseif (preg_match('/Gestión de residuos|Manejo seguro de desechos|Protocolos de reciclaje y disposición/i', $message)) {
               $botman->reply('La gestión de residuos laborales requiere el cumplimiento de protocolos de manejo seguro de desechos, clasificación, almacenamiento adecuado, reciclaje, disposición final y seguimiento de residuos peligrosos, garantizando la protección del medio ambiente, salud de los trabajadores y cumplimiento de la normativa ambiental.');
           } elseif (preg_match('/Comunicación en seguridad|Campañas de concientización|Participación de los trabajadores/i', $message)) {
               $botman->reply('La comunicación en seguridad laboral es fundamental para promover una cultura de seguridad, concientizar a los trabajadores sobre los riesgos laborales, fomentar la participación activa, involucramiento y compromiso de los trabajadores en la prevención de riesgos, y promover la mejora continua en seguridad.');
           } elseif (preg_match('/Salud mental en el trabajo|Prevención del estrés laboral|Apoyo psicológico y bienestar/i', $message)) {
               $botman->reply('La salud mental en el trabajo es esencial para el bienestar integral de los trabajadores, por lo que es necesario promover ambientes laborales saludables, prevenir el estrés laboral, ofrecer apoyo psicológico, programas de bienestar y actividades de promoción de la salud mental en el trabajo.');
           } elseif (preg_match('/Tecnologías|Innovación tecnológica|Equipamiento/i', $message)) {
               $botman->reply('Se utilizan diversas tecnologías y equipamiento avanzado para garantizar eficiencia, seguridad y calidad en la generación, transmisión y distribución de energía eléctrica.');
           } elseif (preg_match('/Generación de energía|Centrales eléctricas|Tecnologías de generación/i', $message)) {
               $botman->reply('Se cuenta con centrales eléctricas equipadas con tecnologías avanzadas de generación de energía, como turbinas de gas, turbinas de vapor, plantas hidroeléctricas, plantas eólicas y plantas solares fotovoltaicas.');
           } elseif (preg_match('/Transmisión de energía|Red eléctrica|Tecnologías de transmisión/i', $message)) {
               $botman->reply('Se opera una extensa red eléctrica de transmisión equipada con tecnologías avanzadas, sistemas de control, protección, automatización y equipos de alta tensión.');
           } elseif (preg_match('/Distribución de energía|Red de distribución|Tecnologías de distribución/i', $message)) {
               $botman->reply('Se gestiona una red de distribución eléctrica equipada con tecnologías modernas, sistemas de control, medición, automatización y equipos de distribución.');
           } elseif (preg_match('/Infraestructuras eléctricas|Subestaciones eléctricas|Equipos de infraestructura/i', $message)) {
               $botman->reply('Se mantienen y operan infraestructuras eléctricas críticas, como subestaciones eléctricas, plantas de transformación y redes de distribución.');
           } elseif (preg_match('/Medición y control|Sistemas de medición|Tecnologías de control/i', $message)) {
               $botman->reply('Se utilizan sistemas avanzados de medición y control equipados con tecnologías modernas, dispositivos inteligentes, medidores inteligentes y sistemas de telemetría.');
           } elseif (preg_match('/Automatización de procesos|Sistemas automatizados|Tecnologías de automatización/i', $message)) {
               $botman->reply('Se implementan sistemas de automatización de procesos equipados con tecnologías avanzadas, software especializado, sistemas SCADA, PLCs, sensores inteligentes y actuadores.');
           } elseif (preg_match('/Gestión de datos|Sistemas de información|Tecnologías de información/i', $message)) {
               $botman->reply('Se utilizan sistemas de información avanzados, plataformas tecnológicas, bases de datos, sistemas de gestión de información, sistemas ERP, sistemas GIS, y tecnologías de big data y analytics.');
           } elseif (preg_match('/Seguridad informática|Ciberseguridad|Tecnologías de seguridad/i', $message)) {
               $botman->reply('Se implementan medidas y tecnologías de seguridad informática y ciberseguridad, como firewalls, sistemas de detección y prevención de intrusiones, sistemas de cifrado, autenticación, sistemas SIEM, y políticas de seguridad.');
           }
           
           
           
           
           elseif (preg_match('/Innovación tecnológica|Investigación y desarrollo|Tecnologías emergentes/i', $message)) {
               $botman->reply('Se promueve la innovación tecnológica, se invierte en investigación y desarrollo, y se adoptan tecnologías emergentes, como energías renovables, almacenamiento de energía, redes inteligentes, IoT, IA, blockchain, y tecnologías digitales.');
           } elseif (preg_match('/Formación y capacitación|Tecnologías de formación|Programas de capacitación/i', $message)) {
               $botman->reply('Se ofrece formación y capacitación a través de programas de formación técnica, cursos de actualización, talleres especializados, certificaciones y plataformas de e-learning.');
           } elseif (preg_match('/Colaboración y alianzas|Tecnologías de colaboración|Partnerships y alianzas/i', $message)) {
               $botman->reply('Se establecen colaboraciones y alianzas estratégicas con empresas tecnológicas, proveedores, startups, instituciones académicas, centros de investigación, y organizaciones internacionales.');
           } elseif (preg_match('/Sostenibilidad y medio ambiente|Tecnologías verdes|Gestión ambiental/i', $message)) {
               $botman->reply('Se promueve la sostenibilidad y gestión ambiental, se implementan tecnologías verdes, energías renovables, eficiencia energética, sistemas de gestión ambiental, y prácticas sostenibles.');
           } elseif (preg_match('/Normativas|Regulaciones|Legislación/i', $message)) {
               $botman->reply('Se establecen normativas y regulaciones para regular y garantizar la seguridad, calidad, eficiencia, confiabilidad, sostenibilidad y protección de los derechos de los usuarios en la generación, transmisión, distribución y comercialización de energía eléctrica.');
           } elseif (preg_match('/Ley de la Industria Eléctrica|LIE|Regulaciones de la LIE/i', $message)) {
               $botman->reply('La Ley de la Industria Eléctrica (LIE) establece el marco legal y regulador para la organización, operación y desarrollo de la industria eléctrica, promoviendo la competencia, eficiencia, transparencia, sostenibilidad, y el acceso universal a los servicios eléctricos.');
           } elseif (preg_match('/Normas Oficiales Mexicanas|NOMs|Regulaciones de NOMs/i', $message)) {
               $botman->reply('Las Normas Oficiales Mexicanas (NOMs) establecen especificaciones técnicas, criterios, procedimientos y requisitos mínimos obligatorios para garantizar la calidad, seguridad, eficiencia, protección ambiental y cumplimiento de estándares en la generación, transmisión, distribución y comercialización de energía eléctrica.');
           } elseif (preg_match('/Tarifas eléctricas|Tarifas|Regulaciones de tarifas/i', $message)) {
               $botman->reply('Las tarifas eléctricas se establecen y regulan mediante criterios, metodologías y procedimientos definidos por la Comisión Reguladora de Energía (CRE), considerando costos, inversiones, eficiencia, calidad, sostenibilidad y protección de los derechos de los usuarios.');
           } elseif (preg_match('/Acceso abierto|Acceso a la red|Regulaciones de acceso abierto/i', $message)) {
               $botman->reply('Se promueve el acceso abierto y no discriminatorio a la red eléctrica de transmisión y distribución, regulado por la CRE, garantizando la competencia, equidad, transparencia, eficiencia, y el acceso de terceros a la infraestructura eléctrica para la generación, transmisión y distribución de energía eléctrica.');
           } elseif (preg_match('/Interconexión eléctrica|Interconexión|Regulaciones de interconexión/i', $message)) {
               $botman->reply('Se establecen regulaciones y procedimientos para la interconexión eléctrica, promoviendo la integración, operación, interconexión, y cooperación entre sistemas eléctricos, países, regiones, y participantes del mercado eléctrico, garantizando la seguridad, confiabilidad, eficiencia y sostenibilidad del sistema eléctrico interconectado.');
           } elseif (preg_match('/Generación distribuida|Generación distribuida|Regulaciones de generación distribuida/i', $message)) {
               $botman->reply('Se promueve la generación distribuida, regulada por la CRE, permitiendo a los usuarios generar, consumir, y vender energía eléctrica en pequeña escala, utilizando fuentes renovables, sistemas de cogeneración eficiente, y tecnologías de generación distribuida, contribuyendo a la diversificación, sostenibilidad y resiliencia del sistema eléctrico.');
           } elseif (preg_match('/Eficiencia energética|Eficiencia|Regulaciones de eficiencia energética/i', $message)) {
               $botman->reply('Se promueve la eficiencia energética y la conservación de energía, estableciendo regulaciones, incentivos, programas, y medidas de fomento para reducir el consumo de energía eléctrica, mejorar la eficiencia en la generación, transmisión, distribución y uso final de la energía eléctrica, y mitigar el impacto ambiental.');
           } elseif (preg_match('/Protección ambiental|Medio ambiente|Regulaciones de protección ambiental/i', $message)) {
               $botman->reply('Se establecen regulaciones y medidas de protección ambiental para minimizar el impacto ambiental, prevenir la contaminación, gestionar los residuos, reducir las emisiones de gases de efecto invernadero, promover el uso de energías renovables, y cumplir con los compromisos internacionales y objetivos de sostenibilidad ambiental.');
           } elseif (preg_match('/Derechos de los usuarios|Protección al consumidor|Regulaciones de derechos de los usuarios/i', $message)) {
               $botman->reply('Se establecen regulaciones y derechos de los usuarios para proteger sus derechos, garantizar la calidad, continuidad, seguridad, confiabilidad, transparencia, información, accesibilidad, tarifas justas, y la prestación eficiente de los servicios eléctricos, promoviendo la participación, consulta, y educación de los usuarios.');
           } elseif (preg_match('/Seguridad eléctrica|Seguridad|Regulaciones de seguridad eléctrica/i', $message)) {
               $botman->reply('Se establecen regulaciones y medidas de seguridad eléctrica para garantizar la protección, seguridad, integridad física, confiabilidad, operación segura, y prevención de accidentes y riesgos eléctricos en la generación, transmisión, distribución y uso de la energía eléctrica, y promover una cultura de seguridad eléctrica.');
           } elseif (preg_match('/Transparencia|Transparencia|Regulaciones de transparencia/i', $message)) {
               $botman->reply('Se promueve la transparencia, rendición de cuentas, y acceso a la información pública en el sector eléctrico, estableciendo regulaciones, mecanismos de supervisión, monitoreo, y divulgación de información sobre la operación, gestión, inversiones, tarifas, contratos, y desempeño del sector eléctrico.');
           } elseif (preg_match('/Participación ciudadana|Participación|Regulaciones de participación ciudadana/i', $message)) {
               $botman->reply('Se promueve la participación ciudadana, consulta pública, y colaboración con la sociedad civil, comunidades, y stakeholders en la toma de decisiones, planificación, desarrollo, operación, y regulación del sector eléctrico, fomentando la inclusión, diálogo, y cooperación en la construcción de un sistema eléctrico sostenible y resiliente.');
           } elseif (preg_match('/Cooperación internacional|Cooperación|Regulaciones de cooperación internacional/i', $message)) {
               $botman->reply('Se establecen mecanismos de cooperación internacional, colaboración bilateral, acuerdos, convenios, y tratados internacionales para promover la integración, interconexión, intercambio, armonización, y cooperación en el desarrollo, operación, regulación, y gestión del sector eléctrico a nivel regional, continental, y global.');
           } elseif (preg_match('/Servicio al Cliente|Atención al cliente|Soporte al cliente/i', $message)) {
               $botman->reply('Se ofrece un servicio al cliente de calidad, eficiente, confiable, personalizado, y accesible para atender las consultas, requerimientos, solicitudes, y necesidades de los usuarios en relación con la generación, transmisión, distribución y comercialización de energía eléctrica.');
           } elseif (preg_match('/Canal de atención|Medios de contacto|Formas de contacto/i', $message)) {
               $botman->reply('Se disponen diversos canales de atención y medios de contacto, como línea telefónica, chat en línea, correo electrónico, aplicación móvil, redes sociales, y oficinas de atención presencial, para facilitar la comunicación, interacción, y acceso de los usuarios al servicio de atención al cliente.');
           } elseif (preg_match('/Consultas y reclamaciones|Consultas|Reclamaciones/i', $message)) {
               $botman->reply('Se gestionan consultas, reclamaciones, quejas, y sugerencias de los usuarios de manera oportuna, transparente, y eficiente, proporcionando respuestas, soluciones, y atención adecuada a sus inquietudes, problemas, y requerimientos en relación con los servicios eléctricos.');
           } elseif (preg_match('/Información y asesoramiento|Información|Asesoramiento/i', $message)) {
               $botman->reply('Se proporciona información, asesoramiento, orientación, y educación a los usuarios sobre los servicios eléctricos, tarifas, normativas, regulaciones, derechos, deberes, y mejores prácticas para promover el uso eficiente, seguro, responsable, y sostenible de la energía eléctrica.');
           } elseif (preg_match('/Facturación y pagos|Facturación|Pagos/i', $message)) {
               $botman->reply('Se gestionan los procesos de facturación, cobro, y pagos de manera clara, precisa, y confiable, ofreciendo diferentes opciones, facilidades, y métodos de pago, y resolviendo dudas, problemas, y consultas relacionadas con los servicios, tarifas, y facturas eléctricas.');
           } elseif (preg_match('/Tarifas y contratos|Tarifas|Contratos/i', $message)) {
               $botman->reply('Se informa y asesora a los usuarios sobre las tarifas eléctricas, opciones de contratación, condiciones, términos, derechos, y obligaciones establecidas en los contratos de suministro eléctrico, garantizando transparencia, claridad, y cumplimiento de la normativa y regulaciones aplicables.');
           }
           
           
           
           
           
           elseif (preg_match('/Emergencias y averías|Emergencias|Averías/i', $message)) {
               $botman->reply('Se atienden y gestionan emergencias, cortes de energía, interrupciones, averías, y fallos en el suministro eléctrico de manera rápida, eficiente, y segura, coordinando acciones, intervenciones, y soluciones con las unidades operativas, técnicas, y de mantenimiento para restablecer el servicio eléctrico.');
           } elseif (preg_match('/Servicios adicionales|Servicios adicionales|Servicios complementarios/i', $message)) {
               $botman->reply('Se ofrecen servicios adicionales, complementarios, y valor agregado, como asistencia técnica, mantenimiento, instalación, inspección, y servicios especiales, para satisfacer las necesidades, requerimientos, y expectativas de los usuarios en relación con los servicios eléctricos y soluciones energéticas.');
           } elseif (preg_match('/Promociones y programas|Promociones|Programas/i', $message)) {
               $botman->reply('Se promocionan y ofrecen programas, promociones, incentivos, beneficios, y soluciones personalizadas, como descuentos, bonificaciones, tarifas preferenciales, y programas de fidelidad, para incentivar el uso eficiente, responsable, y sostenible de la energía eléctrica y recompensar la lealtad de los usuarios.');
           }
           elseif (preg_match('/Educación y sensibilización|Educación|Sensibilización/i', $message)) {
            $botman->reply('Se realizan acciones, campañas, programas, y actividades de educación, sensibilización, concientización, y divulgación sobre el uso eficiente, seguro, responsable, y sostenible de la energía eléctrica, promoviendo la cultura energética, la participación ciudadana, y la responsabilidad social.');
            } elseif (preg_match('/Accesibilidad y inclusión|Accesibilidad|Inclusión/i', $message)) {
                $botman->reply('Se promueve la accesibilidad, inclusión, atención especial, y adaptación de los servicios de atención al cliente para personas con discapacidad, adultos mayores, y grupos vulnerables, garantizando el acceso, uso, y disfrute equitativo de los servicios eléctricos, y respetando los derechos humanos y la dignidad de las personas.');
            } elseif (preg_match('/Satisfacción y calidad|Satisfacción|Calidad/i', $message)) {
                $botman->reply('Se monitorea, evalúa, y mejora continuamente la satisfacción, percepción, y calidad del servicio al cliente, recopilando feedback, opiniones, y sugerencias de los usuarios, y implementando acciones, mejoras, y soluciones para superar expectativas, resolver problemas, y optimizar la experiencia del usuario.');
            } elseif (preg_match('/Políticas y procedimientos|Políticas|Procedimientos/i', $message)) {
                $botman->reply('Se establecen y aplican políticas, procedimientos, estándares, y protocolos de atención al cliente, orientados a garantizar un servicio al cliente eficiente, consistente, uniforme, y de alta calidad, y cumplir con las normativas, regulaciones, y estándares de servicio en el sector eléctrico.');
            } elseif (preg_match('/Desarrollo Profesional|Crecimiento Profesional|Capacitación/i', $message)) {
                $botman->reply('Se promueve el desarrollo profesional, crecimiento profesional, y capacitación continua de los empleados, ofreciendo oportunidades, programas, y recursos para fortalecer competencias, habilidades, conocimientos, y capacidades en tecnologías, procesos, y operación de la infraestructura eléctrica.');
            } elseif (preg_match('/Formación y capacitación|Programas de formación|Cursos de capacitación/i', $message)) {
                $botman->reply('Se ofrecen programas de formación y capacitación, cursos, talleres, seminarios, certificaciones, y plataformas de e-learning, utilizando tecnologías de formación modernas, metodologías pedagógicas, recursos digitales, y herramientas interactivas, para fortalecer las competencias, habilidades, conocimientos, y capacidades del personal en tecnologías, procesos, y operación de la infraestructura eléctrica.');
            } elseif (preg_match('/Crecimiento y desarrollo profesional|Plan de carrera|Oportunidades de crecimiento/i', $message)) {
                $botman->reply('Se implementan planes de carrera, programas de desarrollo profesional, evaluaciones de desempeño, mentorías, coaching, y oportunidades de crecimiento interno, para promover la movilidad, ascensos, y desarrollo profesional de los empleados, y reconocer y recompensar el talento, compromiso, y contribución al éxito organizacional.');
            } elseif (preg_match('/Certificaciones y habilidades|Certificaciones|Habilidades técnicas/i', $message)) {
                $botman->reply('Se promueve la obtención de certificaciones, habilidades técnicas, y competencias especializadas en áreas clave, como ingeniería eléctrica, gestión de proyectos, operación de redes, mantenimiento de equipos, seguridad laboral, eficiencia energética, tecnologías digitales, y gestión de calidad, para garantizar la excelencia, profesionalismo, y alta calidad en el desempeño laboral.');
            } elseif (preg_match('/Innovación y tecnología|Innovación|Tecnologías emergentes/i', $message)) {
                $botman->reply('Se fomenta la innovación, adopción de tecnologías emergentes, y mejora continua, mediante la participación en proyectos innovadores, colaboraciones, alianzas estratégicas, investigación y desarrollo, laboratorios de innovación, y programas de innovación abierta, para impulsar la transformación digital, competitividad, y liderazgo en el sector eléctrico.');
            } elseif (preg_match('/Desarrollo de liderazgo|Liderazgo|Habilidades de liderazgo/i', $message)) {
                $botman->reply('Se desarrollan habilidades de liderazgo, competencias directivas, gestión de equipos, toma de decisiones, comunicación efectiva, y habilidades interpersonales, a través de programas de liderazgo, talleres de desarrollo directivo, coaching ejecutivo, y actividades de fortalecimiento de liderazgo, para formar líderes comprometidos, inspiradores, y transformadores en la organización.');
            } elseif (preg_match('/Cultura organizacional y valores|Cultura organizacional|Valores corporativos/i', $message)) {
                $botman->reply('Se promueve una cultura organizacional sólida, valores corporativos, ética profesional, responsabilidad social, y compromiso con la excelencia, a través de programas de sensibilización, comunicación, formación, y actividades de fortalecimiento cultural, para cultivar un ambiente de trabajo positivo, inclusivo, colaborativo, y orientado a resultados en la organización.');
            } elseif (preg_match('/Reconocimiento y beneficios|Reconocimiento|Beneficios laborales/i', $message)) {
                $botman->reply('Se establecen programas de reconocimiento, incentivos, premios, y beneficios laborales, como bonificaciones, compensaciones, seguros, y oportunidades de desarrollo, para valorar, motivar, retener, y recompensar el desempeño, compromiso, y contribución de los empleados al logro de los objetivos y resultados de la organización.');
            } elseif (preg_match('/Diversidad e inclusión|Diversidad|Inclusión/i', $message)) {
                $botman->reply('Se promueve la diversidad, inclusión, equidad de género, respeto a la diversidad cultural, y igualdad de oportunidades, a través de políticas, programas, y acciones de sensibilización, formación, y fortalecimiento de la diversidad e inclusión, para crear un ambiente de trabajo inclusivo, diverso, y respetuoso de los derechos humanos y la diversidad.');
            } elseif (preg_match('/Salud y bienestar|Salud|Bienestar/i', $message)) {
                $botman->reply('Se implementan programas de salud, bienestar, seguridad laboral, prevención de riesgos, y calidad de vida laboral, ofreciendo servicios, recursos, y actividades para promover la salud física, mental, emocional, y el bienestar integral de los empleados, y crear un ambiente de trabajo saludable, seguro, y equilibrado en la organización.');
            } elseif (preg_match('/Responsabilidad social corporativa|RSC|Sostenibilidad/i', $message)) {
                $botman->reply('Se desarrollan acciones, proyectos, y programas de responsabilidad social corporativa, sostenibilidad, y compromiso social, en áreas como educación, medio ambiente, desarrollo comunitario, y bienestar social, para contribuir al desarrollo sostenible, cuidado del medio ambiente, mejora de la calidad de vida, y generación de impacto positivo en las comunidades y sociedad.');
            } elseif (preg_match('/Comunicación interna y feedback|Comunicación interna|Feedback/i', $message)) {
                $botman->reply('Se fortalece la comunicación interna, retroalimentación, y diálogo abierto, mediante canales de comunicación, plataformas digitales, encuestas, y espacios de participación, para fomentar la transparencia, participación, colaboración, y compromiso de los empleados, y facilitar el intercambio de información, ideas, y feedback en la organización.');
            } elseif (preg_match('/Gestión del cambio y adaptabilidad|Gestión del cambio|Adaptabilidad/i', $message)) {
                $botman->reply('Se promueve la gestión del cambio, adaptabilidad, flexibilidad, resiliencia, y capacidad de respuesta ante los cambios, desafíos, y transformaciones del entorno, mediante programas de gestión del cambio, formación, apoyo, y acompañamiento, para fortalecer la capacidad de adaptación, innovación, y transformación de la organización.');
            } elseif (preg_match('/Tecnologías Emergentes|Innovación Tecnológica|Tecnología Avanzada/i', $message)) {
                $botman->reply('Se adoptan y aplican tecnologías emergentes, innovación tecnológica, y soluciones avanzadas en electrónica, informática, automatización, digitalización, inteligencia artificial, Internet de las cosas (IoT), energías renovables, almacenamiento de energía, redes inteligentes, vehículos eléctricos, y gestión de datos, para mejorar la eficiencia, confiabilidad, seguridad, sostenibilidad, y competitividad en la operación y gestión del sistema eléctrico.');
            } elseif (preg_match('/Inteligencia Artificial|IA|Aprendizaje Automático/i', $message)) {
                $botman->reply('Se implementan soluciones de inteligencia artificial, aprendizaje automático, y procesamiento de datos, para optimizar la planificación, operación, mantenimiento, diagnóstico, pronóstico, análisis predictivo, y toma de decisiones en la infraestructura eléctrica, mejorar la eficiencia energética, reducir costos, y aumentar la autonomía, seguridad, y confiabilidad de los sistemas eléctricos.');
            } elseif (preg_match('/Internet de las Cosas|IoT|Conectividad/i', $message)) {
                $botman->reply('Se integran dispositivos, sensores, sistemas, y plataformas de Internet de las cosas (IoT), para monitorizar, controlar, gestionar, y optimizar la infraestructura eléctrica, redes de distribución, equipos, y procesos en tiempo real, mejorar la eficiencia operativa, detectar y prevenir fallos, y proporcionar servicios inteligentes y personalizados a los usuarios y clientes.');
            } elseif (preg_match('/Energías Renovables|Energía Solar|Energía Eólica/i', $message)) {
                $botman->reply('Se promueve la integración y desarrollo de energías renovables, como energía solar, energía eólica, energía hidroeléctrica, biomasa, y energía geotérmica, mediante proyectos, inversiones, instalaciones, y operaciones sostenibles, para diversificar la matriz energética, reducir las emisiones de gases de efecto invernadero, y contribuir a la transición energética y desarrollo sostenible.');
            }
            
            
            
            
            elseif (preg_match('/Almacenamiento de Energía|Baterías|Sistemas de Almacenamiento/i', $message)) {
                $botman->reply('Se desarrollan y despliegan sistemas de almacenamiento de energía, baterías, acumuladores, y soluciones de gestión de energía, para optimizar la integración, gestión, y utilización de energías renovables, mejorar la estabilidad, fiabilidad, y eficiencia del sistema eléctrico, y proporcionar soluciones de respaldo, regulación, y gestión de la demanda.');
            } elseif (preg_match('/Redes Inteligentes|Smart Grids|Infraestructura de Redes/i', $message)) {
                $botman->reply('Se implementan redes inteligentes, smart grids, infraestructuras de redes avanzadas, y sistemas de gestión de red, para modernizar, optimizar, y digitalizar la infraestructura eléctrica, mejorar la distribución, transmisión, operación, y gestión de la red eléctrica, integrar energías renovables, y ofrecer servicios eléctricos inteligentes, eficientes, y personalizados.');
            } elseif (preg_match('/Vehículos Eléctricos|Movilidad Eléctrica|Carga/i', $message)) {
                $botman->reply('Se promueve la movilidad eléctrica, vehículos eléctricos, infraestructura de carga, y sistemas de gestión de movilidad, mediante proyectos, incentivos, y soluciones sostenibles, para reducir las emisiones de gases contaminantes, mejorar la calidad del aire, diversificar el transporte, y contribuir a la descarbonización y desarrollo sostenible de las ciudades.');
            } elseif (preg_match('/Blockchain|Tecnología Blockchain|Seguridad/i', $message)) {
                $botman->reply('Se exploran y aplican soluciones basadas en tecnología blockchain, registros distribuidos, y criptomonedas, para garantizar la seguridad, trazabilidad, transparencia, confiabilidad, y integridad de las transacciones, contratos, datos, y operaciones en el sector eléctrico, y fortalecer la ciberseguridad, protección de datos, y confianza digital en las redes y sistemas eléctricos.');
            } elseif (preg_match('/Realidad Virtual y Aumentada|Simulación/i', $message)) {
                $botman->reply('Se emplean tecnologías de realidad virtual (VR), realidad aumentada (AR), y simulación, para mejorar la formación, capacitación, mantenimiento, operación, diagnóstico, y visualización de la infraestructura eléctrica, optimizar los procesos, y proporcionar experiencias inmersivas, interactivas, y personalizadas en el desarrollo, gestión, y operación del sistema eléctrico.');
            } elseif (preg_match('/Tecnologías Móviles|5G|Internet Móvil/i', $message)) {
                $botman->reply('Se adoptan tecnologías móviles avanzadas, como 5G, Internet móvil, y aplicaciones móviles, para mejorar la conectividad, comunicación, gestión, y control de la infraestructura eléctrica, optimizar la transmisión, procesamiento, y análisis de datos, y ofrecer servicios, soluciones, y experiencias móviles inteligentes, eficientes, y personalizadas a los usuarios y clientes.');
            } elseif (preg_match('/Computación en la Nube|Cloud Computing|Almacenamiento/i', $message)) {
                $botman->reply('Se implementan soluciones de computación en la nube, cloud computing, almacenamiento en la nube, y servicios digitales, para optimizar la gestión, procesamiento, análisis, almacenamiento, y acceso a datos, información, aplicaciones, y recursos tecnológicos, mejorar la eficiencia operativa, reducir costos, y proporcionar soluciones escalables, flexibles, y seguras en el sector eléctrico.');
            } elseif (preg_match('/Gestión de Datos y Analítica|Big Data|Analítica de Datos/i', $message)) {
                $botman->reply('Se desarrollan capacidades de gestión de datos, analítica avanzada, big data, y visualización de datos, para recopilar, procesar, analizar, interpretar, y utilizar grandes volúmenes de datos e información, generar insights, conocimientos, y inteligencia empresarial, y mejorar la toma de decisiones, innovación, eficiencia, y competitividad en la operación y gestión del sistema eléctrico.');
            } elseif (preg_match('/Seguridad Cibernética|Ciberseguridad|Protección de Datos/i', $message)) {
                $botman->reply('Se fortalece la seguridad cibernética, protección de datos, y privacidad, mediante la implementación de políticas, prácticas, tecnologías, y soluciones de ciberseguridad, para prevenir, detectar, responder, y mitigar ciberataques, vulnerabilidades, amenazas, y riesgos en las redes, sistemas, y operaciones del sector eléctrico, y garantizar la integridad, confidencialidad, y disponibilidad de la información y servicios digitales.');
            } elseif (preg_match('/Integración y Automatización de Procesos|Automatización|Procesos/i', $message)) {
                $botman->reply('Se impulsa la integración y automatización de procesos, sistemas, y operaciones, mediante la adopción de soluciones, herramientas, y plataformas de automatización, robótica, y gestión de procesos, para optimizar la eficiencia, productividad, rendimiento, y calidad en la operación, gestión, y mantenimiento de la infraestructura eléctrica, y reducir la intervención humana, errores, y costos operativos.');
            } elseif (preg_match('/Realidad Mixta|MR|Experiencias Inmersivas/i', $message)) {
                $botman->reply('Se utilizan tecnologías de realidad mixta (MR), experiencias inmersivas, y entornos virtuales, para mejorar la formación, capacitación, simulación, colaboración, y comunicación en el desarrollo, gestión, operación, mantenimiento, y diagnóstico de la infraestructura eléctrica, proporcionar experiencias interactivas, realistas, y personalizadas, y fomentar la innovación, creatividad, y colaboración en la organización.');
            } elseif (preg_match('/Impresión 3D|Fabricación Aditiva|Prototipado/i', $message)) {
                $botman->reply('Se adoptan tecnologías de impresión 3D, fabricación aditiva, y prototipado rápido, para diseñar, desarrollar, fabricar, y personalizar componentes, piezas, y equipos eléctricos, optimizar la producción, mantenimiento, y reparación de la infraestructura eléctrica, reducir los tiempos, costos, y residuos de fabricación, y fomentar la innovación, agilidad, y sostenibilidad en la producción y operaciones.');
            } elseif (preg_match('/Tecnología Espacial|Satélites|Observación Terrestre/i', $message)) {
                $botman->reply('Se aprovechan las tecnologías espaciales, satélites, observación terrestre, y sistemas de posicionamiento global (GPS), para monitorizar, inspeccionar, gestionar, y optimizar la infraestructura eléctrica, realizar estudios geoespaciales, análisis de terrenos, y planificación de redes, y proporcionar servicios, soluciones, y información geoespacial precisa, actualizada, y detallada en el sector eléctrico.');
            } elseif (preg_match('/Biotechnología|Bioenergía|Energía Sostenible/i', $message)) {
                $botman->reply('Se investigan y aplican avances en biotecnología, bioenergía, y energías sostenibles, para desarrollar soluciones, procesos, y proyectos innovadores, como bioenergía, biocombustibles, y bioelectrónica, y promover el desarrollo de fuentes de energía renovables, sostenibles, y alternativas, y contribuir a la diversificación, eficiencia, y sostenibilidad de la matriz energética y del sector eléctrico.');
            } elseif (preg_match('/Impresión Orgánica|Electrónica Flexible|Tecnología Avanzada/i', $message)) {
                $botman->reply('Se investigan y desarrollan tecnologías emergentes, como impresión orgánica, electrónica flexible, y materiales avanzados, para diseñar, fabricar, y integrar componentes, dispositivos, y sistemas eléctricos más eficientes, sostenibles, y personalizados, y promover la innovación, competitividad, y liderazgo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Nanotecnología|Nanomateriales|Nanoelectrónica/i', $message)) {
                $botman->reply('Se exploran y aplican avances en nanotecnología, nanomateriales, y nanoelectrónica, para desarrollar y optimizar componentes, dispositivos, y sistemas eléctricos a escala nanométrica, mejorar la eficiencia, rendimiento, y funcionalidad de los equipos, y fomentar la innovación, miniaturización, y desarrollo de soluciones avanzadas en el sector eléctrico.');
            } elseif (preg_match('/Integración de Sistemas|Interoperabilidad|Conectividad/i', $message)) {
                $botman->reply('Se promueve la integración de sistemas, interoperabilidad, y conectividad entre diferentes plataformas, tecnologías, dispositivos, y aplicaciones, mediante la adopción de estándares, protocolos, y soluciones de integración, para optimizar la gestión, operación, control, y monitorización de la infraestructura eléctrica, mejorar la eficiencia, interoperabilidad, y experiencia del usuario en el sector eléctrico.');
            } elseif (preg_match('/Tecnología de Quantum|Computación Cuántica|Criptografía/i', $message)) {
                $botman->reply('Se investigan y adoptan tecnologías de quantum, computación cuántica, y criptografía cuántica, para desarrollar y aplicar soluciones, algoritmos, y sistemas avanzados en el procesamiento, análisis, optimización, y seguridad de datos e información, y fomentar la innovación, competitividad, y liderazgo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Tecnología de Grafeno|Nanomateriales|Innovación/i', $message)) {
                $botman->reply('Se exploran y aplican tecnologías de grafeno, nanomateriales, y materiales avanzados, para diseñar, fabricar, y integrar componentes, dispositivos, y sistemas eléctricos más eficientes, ligeros, resistentes, y sostenibles, y promover la innovación, competitividad, y liderazgo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Tecnología Híbrida|Combinación de Tecnologías|Innovación/i', $message)) {
                $botman->reply('Se promueve la adopción de tecnologías híbridas, combinación de tecnologías, y soluciones integradas, mediante la integración, fusión, y convergencia de diferentes tecnologías, sistemas, y plataformas, para desarrollar soluciones, productos, y servicios más completos, flexibles, y personalizados, y fomentar la innovación, diversificación, y adaptabilidad en el sector eléctrico.');
            } elseif (preg_match('/Tecnología Sostenible|Desarrollo Sostenible|Innovación/i', $message)) {
                $botman->reply('Se impulsa la adopción de tecnologías sostenibles, desarrollo sostenible, y soluciones innovadoras, para promover prácticas, proyectos, y procesos más sostenibles, responsables, y respetuosos con el medio ambiente, reducir el impacto ambiental, y contribuir al desarrollo sostenible, protección del planeta, y bienestar de la sociedad en el sector eléctrico.');
            } elseif (preg_match('/Gestión de Proyectos|Project Management|Administración de Proyectos/i', $message)) {
                $botman->reply('Se aplica una gestión de proyectos profesional, efectiva, y sistemática, utilizando metodologías, herramientas, y prácticas de administración de proyectos, como PMI, Prince2, y Agile, para planificar, ejecutar, controlar, y cerrar proyectos de infraestructura eléctrica, garantizando el cumplimiento de objetivos, calidad, alcance, tiempo, costos, y stakeholders, y optimizar recursos, procesos, y resultados en la ejecución de proyectos.');
            } elseif (preg_match('/Metodologías de Gestión|PMI|Prince2|Agile/i', $message)) {
                $botman->reply('Se emplean metodologías de gestión reconocidas, como PMI (Project Management Institute), Prince2 (Projects IN Controlled Environments), y Agile (Scrum, Kanban), para estandarizar, estructurar, y optimizar la gestión de proyectos, aplicando principios, procesos, prácticas, y herramientas de administración de proyectos, y fomentar la colaboración, comunicación, flexibilidad, y adaptabilidad en la ejecución y entrega de proyectos.');
            } elseif (preg_match('/Planificación de Proyectos|Cronograma|Alcance|Recursos/i', $message)) {
                $botman->reply('Se realiza una planificación detallada, estructurada, y sistemática de proyectos, utilizando herramientas, técnicas, y metodologías de planificación, como cronogramas, diagramas de Gantt, WBS (Work Breakdown Structure), y PERT (Program Evaluation Review Technique), para definir, organizar, asignar, y gestionar el alcance, tiempo, recursos, actividades, tareas, y entregables de los proyectos, y garantizar la ejecución eficiente, efectiva, y exitosa de los proyectos.');
            } elseif (preg_match('/Ejecución y Control de Proyectos|Monitoreo|Seguimiento|Control/i', $message)) {
                $botman->reply('Se lleva a cabo una ejecución y control riguroso, proactivo, y continuo de proyectos, mediante técnicas, herramientas, y prácticas de monitoreo, seguimiento, control, y reporting de proyectos, para supervisar, evaluar, medir, y ajustar el progreso, desempeño, avance, riesgos, problemas, y cambios en los proyectos, y asegurar la conformidad, calidad, eficiencia, y cumplimiento de objetivos y requisitos del proyecto.');
            }
            
            
            
            
            
            elseif (preg_match('/Gestión de Recursos|Humanos|Materiales|Financieros/i', $message)) {
                $botman->reply('Se realiza una gestión integral, óptima, y equilibrada de recursos, incluyendo recursos humanos, materiales, financieros, tecnológicos, y ambientales, mediante técnicas, herramientas, y prácticas de gestión de recursos, como asignación, planificación, optimización, seguimiento, y control de recursos, para asegurar la disponibilidad, utilización, eficiencia, y calidad de los recursos en la ejecución de proyectos, y maximizar el valor y retorno de inversión en los proyectos.');
            } elseif (preg_match('/Gestión de Stakeholders|Comunicación|Partes Interesadas|Interesados/i', $message)) {
                $botman->reply('Se implementa una gestión de stakeholders efectiva, comunicativa, y colaborativa, identificando, analizando, clasificando, involucrando, y gestionando a todas las partes interesadas, como clientes, proveedores, equipos, usuarios, y comunidad, mediante técnicas, herramientas, y prácticas de gestión de stakeholders, para entender, satisfacer, gestionar, y responder a sus necesidades, expectativas, intereses, y expectativas, y asegurar su compromiso, satisfacción, y apoyo en los proyectos.');
            } elseif (preg_match('/Gestión de Riesgos|Identificación|Evaluación|Mitigación/i', $message)) {
                $botman->reply('Se realiza una gestión de riesgos proactiva, sistemática, y adaptativa, mediante la identificación, evaluación, análisis, priorización, planificación, mitigación, monitoreo, y control de riesgos, utilizando técnicas, herramientas, y prácticas de gestión de riesgos, como matrices de riesgos, análisis SWOT, y planificación de contingencia, para anticipar, prevenir, minimizar, y gestionar los riesgos, incertidumbres, y contingencias en los proyectos, y proteger y maximizar el valor y resultados de los proyectos.');
            } elseif (preg_match('/Calidad en Proyectos|Aseguramiento|Control|Certificación/i', $message)) {
                $botman->reply('Se garantiza la calidad, excelencia, y conformidad en proyectos, mediante la implementación de sistemas, metodologías, prácticas, y estándares de calidad, como ISO 9001, Six Sigma, y TQM (Total Quality Management), para asegurar la satisfacción, cumplimiento, eficacia, eficiencia, y mejora continua en los procesos, productos, servicios, y resultados de los proyectos, y alcanzar y mantener altos niveles de calidad, excelencia, y certificación en la gestión y ejecución de proyectos.');
            }elseif (preg_match('/Integración de Proyectos|Coordinación|Unificación|Sinergia/i', $message)) {
                $botman->reply('Se promueve la integración, coordinación, unificación, y sinergia entre proyectos, equipos, departamentos, y áreas, mediante prácticas, herramientas, y técnicas de gestión de integración, como gestión de programas, portafolios, y PMO (Project Management Office), para alinear, armonizar, optimizar, y aprovechar recursos, esfuerzos, capacidades, y conocimientos, y fomentar la colaboración, cooperación, y trabajo en equipo en la organización y ejecución de proyectos.');
            } elseif (preg_match('/Cierre de Proyectos|Finalización|Entrega|Evaluación/i', $message)) {
                $botman->reply('Se realiza un cierre ordenado, sistemático, y evaluativo de proyectos, mediante la finalización, entrega, aceptación, revisión, evaluación, y retroalimentación de proyectos, utilizando técnicas, herramientas, y prácticas de cierre de proyectos, como lecciones aprendidas, auditorías, y post-mortem, para asegurar el cumplimiento, satisfacción, aprendizaje, mejora, y éxito en la finalización y entrega de proyectos, y facilitar la transferencia de conocimientos, resultados, y aprendizajes en los proyectos.');
            } elseif (preg_match('/Gestión Ágil|Scrum|Kanban|Agilidad/i', $message)) {
                $botman->reply('Se adoptan prácticas, principios, y marcos de trabajo ágiles, como Scrum, Kanban, Lean, y Agile, para fomentar una gestión ágil, flexible, adaptativa, y colaborativa de proyectos, promoviendo la iteración, inspección, adaptación, mejora continua, y entrega de valor en los proyectos, y facilitar la respuesta rápida, eficiente, y efectiva a cambios, desafíos, y oportunidades en el entorno, mercado, y requerimientos de los proyectos.');
            } elseif (preg_match('/Gestión de Programas|Portafolios|PMO|Estrategia/i', $message)) {
                $botman->reply('Se impulsa la gestión de programas y portafolios, mediante la implementación y operación de una PMO (Project Management Office) o oficina de gestión de proyectos, para alinear, coordinar, supervisar, y optimizar la estrategia, planificación, ejecución, control, y valor de programas y proyectos, y asegurar una gestión integrada, estratégica, y alineada con los objetivos, metas, prioridades, y beneficios organizacionales.');
            } elseif (preg_match('/Gestión de Cambios|Adaptabilidad|Flexibilidad|Resiliencia/i', $message)) {
                $botman->reply('Se promueve una gestión de cambios efectiva, adaptativa, flexible, y resiliente, mediante la identificación, evaluación, planificación, implementación, y seguimiento de cambios, utilizando técnicas, herramientas, y prácticas de gestión de cambios, como análisis de impacto, comunicación, formación, y gestión de resistencias, para facilitar la adaptación, aceptación, y aprovechamiento de cambios, innovaciones, y transformaciones en los proyectos y organización.');
            } elseif (preg_match('/Operación y Mantenimiento de Equipos|Equipos|Maquinaria|Instalaciones/i', $message)) {
                $botman->reply('Se realiza una operación y mantenimiento eficiente, efectiva, y segura de equipos, maquinaria, instalaciones, y sistemas eléctricos, utilizando técnicas, herramientas, procedimientos, y prácticas de operación y mantenimiento, para asegurar la disponibilidad, confiabilidad, rendimiento, durabilidad, y eficiencia operativa de los equipos, y garantizar la seguridad, integridad, cumplimiento, y sostenibilidad en la operación y mantenimiento de los activos y infraestructura eléctrica.');
            } elseif (preg_match('/Inspección de Equipos|Revisión|Supervisión|Diagnóstico/i', $message)) {
                $botman->reply('Se lleva a cabo una inspección, revisión, supervisión, y diagnóstico riguroso, sistemático, y preventivo de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante técnicas, herramientas, y procedimientos de inspección, como checklist, pruebas, análisis, y monitoreo, para detectar, identificar, evaluar, prevenir, y corregir anomalías, defectos, fallos, desgastes, deterioros, y riesgos en los equipos, y asegurar su correcto funcionamiento y rendimiento.');
            } elseif (preg_match('/Mantenimiento Preventivo|Planificación|Programación|Ejecución/i', $message)) {
                $botman->reply('Se implementa un mantenimiento preventivo planificado, programado, y ejecutado de equipos, maquinaria, instalaciones, y sistemas eléctricos, utilizando técnicas, herramientas, y prácticas de mantenimiento preventivo, como calendarios, rutinas, programas, y checklist de mantenimiento, para optimizar la disponibilidad, confiabilidad, vida útil, rendimiento, y eficiencia de los equipos, y prevenir, reducir, y mitigar fallos, averías, desgastes, deterioros, y riesgos en los equipos.');
            } elseif (preg_match('/Mantenimiento Correctivo|Reparación|Solución de Problemas|Intervención/i', $message)) {
                $botman->reply('Se realiza un mantenimiento correctivo reactivo, proactivo, y sistemático de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante técnicas, herramientas, y procedimientos de mantenimiento correctivo, como diagnóstico, reparación, ajuste, calibración, y reemplazo de componentes, para corregir, restablecer, y solucionar fallos, averías, defectos, desgastes, deterioros, y problemas en los equipos, y recuperar y restaurar su funcionamiento y rendimiento normal.');
            } elseif (preg_match('/Gestión de Activos|Inventario|Control|Valoración/i', $message)) {
                $botman->reply('Se realiza una gestión integral, óptima, y estratégica de activos, equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante técnicas, herramientas, y prácticas de gestión de activos, como inventario, control, valoración, análisis de ciclo de vida, y optimización de activos, para maximizar el valor, rendimiento, utilidad, y retorno de inversión de los activos, y optimizar la disponibilidad, confiabilidad, eficiencia, y sostenibilidad de los equipos.');
            } elseif (preg_match('/Operación de Equipos|Manejo|Control|Funcionamiento/i', $message)) {
                $botman->reply('Se lleva a cabo una operación eficiente, segura, y controlada de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante técnicas, herramientas, y procedimientos de operación, como manuales, guías, protocolos, y controles operativos, para garantizar la operatividad, rendimiento, eficiencia, y seguridad en la operación de los equipos, y minimizar riesgos, fallos, averías, desgastes, y impactos en la operación y funcionamiento de los equipos.');
            } elseif (preg_match('/Capacitación y Formación|Entrenamiento|Desarrollo|Habilidades/i', $message)) {
                $botman->reply('Se imparte una capacitación, formación, y entrenamiento continua y especializada en operación y mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante programas, cursos, talleres, y sesiones de capacitación, para desarrollar, actualizar, y fortalecer competencias, habilidades, conocimientos, y capacidades técnicas, operativas, y profesionales en los equipos, y promover una cultura de excelencia, seguridad, y mejora continua en la operación y mantenimiento.');
            } elseif (preg_match('/Seguridad en Operación|Normativas|Procedimientos|Protocolos/i', $message)) {
                $botman->reply('Se asegura la seguridad integral y operativa en la operación y mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante el cumplimiento, aplicación, y seguimiento de normativas, procedimientos, protocolos, estándares, y prácticas de seguridad, como OSHA, NFPA, y NOMs, para prevenir, controlar, mitigar, y gestionar riesgos, peligros, accidentes, incidentes, y emergencias en la operación y mantenimiento de los equipos.');
            } elseif (preg_match('/Tecnologías de Monitoreo|Monitoreo|Telemetría|Sensores/i', $message)) {
                $botman->reply('Se utiliza tecnología avanzada de monitoreo, telemetría, sensores, y diagnóstico remoto en la operación y mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante la implementación, integración, y aplicación de sistemas, plataformas, dispositivos, y herramientas de monitoreo y diagnóstico, para recopilar, analizar, interpretar, y visualizar datos, información, y métricas de rendimiento, operación, y salud de los equipos.');
            } elseif (preg_match('/Eficiencia Energética|Optimización|Consumo|Rendimiento/i', $message)) {
                $botman->reply('Se promueve la eficiencia energética, optimización, y rendimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante la aplicación, implementación, y adopción de prácticas, técnicas, herramientas, y soluciones de eficiencia energética, para minimizar, reducir, y optimizar el consumo, desperdicio, y pérdida de energía, recursos, y costos en la operación y mantenimiento de los equipos, y maximizar la eficiencia, rendimiento, y sostenibilidad de los equipos.');
            } elseif (preg_match('/Innovación en Mantenimiento|Tecnologías|Técnicas|Procesos/i', $message)) {
                $botman->reply('Se fomenta la innovación, investigación, y desarrollo en mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante la exploración, experimentación, implementación, y adopción de tecnologías, técnicas, procesos, y prácticas innovadoras, como IoT, AI, ML, y Predictive Maintenance, para optimizar, mejorar, y transformar la operación, mantenimiento, rendimiento, y sostenibilidad de los equipos y activos.');
            } elseif (preg_match('/Gestión de Calidad|ISO|Auditoría|Mejora Continua/i', $message)) {
                $botman->reply('Se asegura la gestión de calidad integral en operación y mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante la implementación, certificación, auditoría, y mejora continua de sistemas, estándares, y prácticas de calidad, como ISO 9001, y Six Sigma, para garantizar la excelencia, satisfacción, confiabilidad, y cumplimiento de requisitos, normas, y estándares de calidad en la operación y mantenimiento de los equipos.');
            }
            
            
            
            
            elseif (preg_match('/Sostenibilidad y Medio Ambiente|Eco-amigable|Reciclaje|Conservación/i', $message)) {
                $botman->reply('Se promueve la sostenibilidad, medio ambiente, y eco-amigabilidad en operación y mantenimiento de equipos, maquinaria, instalaciones, y sistemas eléctricos, mediante la implementación, adopción, y práctica de soluciones, técnicas, y prácticas sostenibles, ecológicas, y responsables, para reducir, minimizar, y mitigar el impacto ambiental, huella de carbono, y contaminación en la operación y mantenimiento de los equipos, y contribuir a la conservación, protección, y preservación del medio ambiente.');
            } elseif (preg_match('/Innovación y Desarrollo Tecnológico|Tecnología|Innovación|Investigación/i', $message)) {
                $botman->reply('Se impulsa la innovación y desarrollo tecnológico continuo, integral, y estratégico, mediante la investigación, experimentación, desarrollo, implementación, y adopción de tecnologías, soluciones, productos, servicios, y sistemas innovadores, para potenciar la transformación digital, optimización operativa, modernización infraestructura, mejora servicio al cliente, y competitividad en el sector eléctrico.');
            } elseif (preg_match('/Tecnologías Emergentes|IA|IoT|ML|Blockchain/i', $message)) {
                $botman->reply('Se exploran y adoptan tecnologías emergentes y disruptivas, como Inteligencia Artificial (IA), Internet de las Cosas (IoT), Machine Learning (ML), Blockchain, y Realidad Virtual/Aumentada (VR/AR), para desarrollar, innovar, y optimizar soluciones, aplicaciones, servicios, y plataformas tecnológicas avanzadas, y potenciar la transformación, digitalización, y competitividad en el sector eléctrico.');
            } elseif (preg_match('/Colaboración y Alianzas|Partnerships|Cooperación|Asociaciones/i', $message)) {
                $botman->reply('Se fomenta la colaboración, cooperación, y alianzas estratégicas con instituciones, organizaciones, empresas, universidades, centros de investigación, y comunidades, mediante partnerships, joint ventures, colaboraciones, y asociaciones, para promover y potenciar la innovación, investigación, desarrollo, y adopción de tecnologías, soluciones, y proyectos tecnológicos innovadores, y fortalecer la competitividad, crecimiento, y liderazgo en el sector eléctrico.');
            } elseif (preg_match('/Transformación Digital|Digitalización|Automatización|Optimización/i', $message)) {
                $botman->reply('Se impulsa la transformación digital, digitalización, y automatización de procesos, operaciones, servicios, y sistemas en el sector eléctrico, mediante la implementación, integración, y adopción de tecnologías, soluciones, plataformas, y sistemas digitales, como IoT, cloud computing, big data, analytics, y sistemas ERP/CRM, para optimizar, mejorar, agilizar, y personalizar la operación, gestión, servicio, y experiencia en el sector eléctrico.');
            } elseif (preg_match('/Innovación Abierta|Open Innovation|Crowdsourcing|Ideation/i', $message)) {
                $botman->reply('Se promueve la innovación abierta, crowdsourcing, ideation, y co-creación colaborativa, mediante la participación, involucramiento, y colaboración de comunidades, usuarios, clientes, empleados, y stakeholders, en el desarrollo, diseño, evaluación, y mejora de soluciones, productos, servicios, y proyectos innovadores, para fomentar la creatividad, diversidad, participación, y colaboración en la innovación y desarrollo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Gestión de la Innovación|Pipeline|Portfolio|Roadmap/i', $message)) {
                $botman->reply('Se realiza una gestión estratégica, sistemática, y integral de la innovación, mediante la definición, diseño, desarrollo, planificación, implementación, y seguimiento de un pipeline, portfolio, y roadmap de innovación, utilizando herramientas, metodologías, y prácticas de gestión de la innovación, para identificar, priorizar, impulsar, y gestionar proyectos, iniciativas, y oportunidades de innovación y desarrollo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Cultura de Innovación|Mindset|Creatividad|Agilidad/i', $message)) {
                $botman->reply('Se fomenta una cultura de innovación, creatividad, agilidad, y aprendizaje continuo, mediante el desarrollo, promoción, y fortalecimiento de un mindset innovador, creativo, ágil, y colaborativo, en la organización, equipos, y empleados, mediante programas, actividades, y prácticas de capacitación, formación, mentoría, y coaching, para inspirar, motivar, y empoderar la innovación y desarrollo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Ecosistema de Innovación|Hub|Centro de Innovación|Laboratorio/i', $message)) {
                $botman->reply('Se impulsa y desarrolla un ecosistema de innovación, colaboración, y emprendimiento, mediante la creación, establecimiento, y operación de hubs, centros de innovación, laboratorios, incubadoras, y aceleradoras de innovación, tecnología, y emprendimiento, para facilitar, apoyar, y potenciar la innovación, investigación, desarrollo, y adopción de tecnologías, soluciones, y proyectos innovadores en el sector eléctrico.');
            } elseif (preg_match('/Compliance y Regulación|Normativas|Estándares|Licencias/i', $message)) {
                $botman->reply('Se cumple y respeta la compliance, regulación, normativas, estándares, licencias, y requisitos legales, éticos, y corporativos, relacionados con la innovación, tecnología, y desarrollo tecnológico en el sector eléctrico, mediante la implementación, seguimiento, y cumplimiento de políticas, procedimientos, y controles de cumplimiento, para garantizar la ética, transparencia, integridad, y responsabilidad en la innovación y desarrollo tecnológico.');
            } elseif (preg_match('/Financiación de Innovación|Funding|Inversión|Subvenciones/i', $message)) {
                $botman->reply('Se busca y gestiona financiación, funding, inversión, y subvenciones para la innovación, tecnología, y desarrollo tecnológico, mediante la identificación, evaluación, y gestión de oportunidades, fuentes, y mecanismos de financiación, como capital riesgo, inversores, fondos, y programas de financiación y subvenciones, para apoyar, impulsar, y acelerar la innovación y desarrollo tecnológico en el sector eléctrico.');
            } elseif (preg_match('/Ética y Responsabilidad|Integridad|Transparencia|Sostenibilidad/i', $message)) {
                $botman->reply('Se promueve y practica una ética, responsabilidad, integridad, transparencia, y sostenibilidad en la innovación, tecnología, y desarrollo tecnológico, mediante el establecimiento, promoción, y cumplimiento de principios, valores, y políticas éticas, responsables, y sostenibles, para garantizar el bienestar, equidad, confianza, y contribución positiva a la sociedad y medio ambiente en la innovación y desarrollo tecnológico.');
            } elseif (preg_match('/Rendición de Cuentas|Reporte|Rendición|Rendición de Cuentas/i', $message)) {
                $botman->reply('Para realizar una rendición de cuentas, primero debes ingresar al listado de empleados, buscar al empleado correspondiente, dirigirte al perfil del empleado en la sección de documentos y subir el documento de rendición de cuentas, ya sea manualmente llenando los campos requeridos o subiendo un PDF directamente.');
            } elseif (preg_match('/Llamada de Atención|Llamado|Atención|Llamada/i', $message)) {
                $botman->reply('Para generar una llamada de atención, debes ingresar al listado de empleados, buscar al empleado correspondiente, dirigirte al perfil del empleado en la sección de documentos y subir el documento de llamada de atención, ya sea manualmente llenando los campos requeridos o subiendo un PDF directamente. Una vez generado, se informará automáticamente por correo electrónico a quien la hizo, al empleado correspondiente y al usuario que se manda a revisar.');
            } elseif (preg_match('/Acta Administrativa|Acta|Administrativa|Acto Administrativo/i', $message)) {
                $botman->reply('Para generar un acta administrativa, debes ingresar al listado de empleados, buscar al empleado correspondiente, dirigirte al perfil del empleado en la sección de documentos y subir el acta administrativa, ya sea manualmente llenando los campos requeridos o subiendo un PDF directamente.');
            } elseif (preg_match('/Código de Ética|Ética|Código Ética|Código/i', $message)) {
                $botman->reply('Al registrar un usuario en DisSuper, se le envía automáticamente su código de ética a su correo electrónico para asegurar que conozca y cumpla con los principios y valores de la empresa.');
            } elseif (preg_match('/Notificaciones|Notificación|Sistema de Notificaciones|Alertas/i', $message)) {
                $botman->reply('DisSuper cuenta con un sistema interno de notificaciones que te informará si te mandaron un documento a revisión, manteniéndote al tanto de las acciones pendientes y actualizaciones importantes.');
            } elseif (preg_match('/Restablecimiento de Contraseñas|Restablecer Contraseña|Olvidé mi Contraseña/i', $message)) {
                $botman->reply('DisSuper cuenta con un sistema de restablecimiento de contraseñas bastante completo y seguro que permite recuperar la contraseña sin necesidad de interacción humana, garantizando la privacidad y seguridad de tus datos.');
            } elseif (preg_match('/Mensajería por Correo Electrónico|Correo Electrónico|Mensajería|Email/i', $message)) {
                $botman->reply('DisSuper tiene integrada una mensajería por correo electrónico que permite enviar y recibir mensajes, notificaciones, y documentos en tiempo real, manteniendo una comunicación efectiva y organizada entre los usuarios.');
            } elseif (preg_match('/Sistema de Envío Automático|Envío Automático|Envío en Tiempo Real/i', $message)) {
                $botman->reply('DisSuper cuenta con un sistema de envío automático de correos en tiempo real que informa de manera automática y eficiente sobre rendiciones de cuentas, llamadas de atención, actas administrativas, y otros documentos importantes, garantizando una comunicación oportuna y efectiva.');
            } elseif (preg_match('/Documentos|Subir Documento|Generar Documento|Perfil de Empleado/i', $message)) {
                $botman->reply('Para generar cualquier documento en DisSuper, debes ingresar al listado de empleados, buscar al empleado al que se quiere hacer el documento, dirigirte al perfil del empleado en la sección de documentos y hay 2 formas de subir un documento: hacerlo manualmente llenando los campos requeridos o subir un PDF directamente.');
            } elseif (preg_match('/Contraseñas Encriptadas|Encriptación|Seguridad/i', $message)) {
                $botman->reply('Todas las contraseñas en DisSuper están encriptadas para garantizar la seguridad y privacidad de los datos de los usuarios, cumpliendo con los más altos estándares de seguridad y protección de la información.');
            } elseif (preg_match('/Registro de Usuario|Registrar Usuario|Registro|Usuario/i', $message)) {
                $botman->reply('Para registrarte en DisSuper, debes completar el formulario de registro con tus datos personales y laborales, y se te enviará automáticamente tu código de ética a tu correo electrónico.');
            } elseif (preg_match('/Inicio de Sesión|Iniciar Sesión|Login|Acceso/i', $message)) {
                $botman->reply('Para iniciar sesión en DisSuper, debes ingresar tu correo electrónico y contraseña en el formulario de inicio de sesión.');
            } elseif (preg_match('/Perfil de Empleado|Empleado|Perfil|Datos Personales/i', $message)) {
                $botman->reply('En el perfil de empleado de DisSuper, puedes ver y actualizar tus datos personales, documentos, rendiciones de cuentas, llamadas de atención, actas administrativas, y recibir notificaciones importantes.');
            } elseif (preg_match('/Listado de Empleados|Empleados|Listado|Directorio/i', $message)) {
                $botman->reply('En el listado de empleados de DisSuper, puedes buscar y acceder a los perfiles de todos los empleados registrados para gestionar y revisar sus documentos y rendiciones de cuentas.');
            } elseif (preg_match('/Subir PDF|Subir Documento|PDF|Documento/i', $message)) {
                $botman->reply('Para subir un PDF o documento en DisSuper, puedes hacerlo manualmente llenando los campos requeridos o subir un PDF directamente desde el perfil del empleado en la sección de documentos.');
            } elseif (preg_match('/Notificaciones Internas|Notificación Interna|Alertas Internas|Sistema de Notificaciones Internas/i', $message)) {
                $botman->reply('DisSuper cuenta con un sistema interno de notificaciones que te mantendrá informado sobre acciones pendientes, documentos a revisión, y actualizaciones importantes en tiempo real.');
            } 
            
            
            
            
            
            elseif (preg_match('/Mensajería Interna|Chat Interno|Comunicación Interna|Mensajería/i', $message)) {
            $botman->reply('En DisSuper, puedes utilizar la mensajería interna para enviar y recibir mensajes, notificaciones, y documentos entre los usuarios para mantener una comunicación efectiva y organizada.');
            } elseif (preg_match('/Restablecer Contraseña|Olvidé mi Contraseña|Recuperar Contraseña|Restablecimiento de Contraseñas/i', $message)) {
                $botman->reply('Si olvidaste tu contraseña en DisSuper, puedes utilizar el sistema de restablecimiento de contraseñas para recuperarla de forma segura y sin necesidad de interacción humana.');
            } elseif (preg_match('/Seguridad|Protección de Datos|Encriptación|Contraseñas Encriptadas/i', $message)) {
                $botman->reply('DisSuper utiliza encriptación y otras medidas de seguridad avanzadas para proteger tus datos personales y documentos, garantizando la seguridad y privacidad de la información de los usuarios.');
            } elseif (preg_match('/Soporte|Ayuda|Asistencia|Soporte Técnico/i', $message)) {
                $botman->reply('Para obtener soporte o ayuda en DisSuper, puedes contactar al equipo de soporte técnico a través del chat interno o enviar un correo electrónico para resolver cualquier duda o problema relacionado con la app.');
            } elseif (preg_match('/Contador de Documentos|Contador|Documentos|Historial|Proceso de Vida/i', $message)) {
                $botman->reply('Cada empleado en DisSuper tiene un contador de documentos que lleva, además de un historial detallado que muestra cuándo se hizo el documento, quién lo hizo, quién lo aceptó, y el documento explicando el motivo del documento.');
            }  
            elseif (preg_match('/Proceso de Revisión|Revisión|Aceptado|Rechazado|Corrección/i', $message)) {
                $botman->reply('En DisSuper, cada documento pasa por un proceso de vida que comienza con el envío a revisión y posterior aceptación. Si es rechazado, se envía a revisión con un comentario del motivo del rechazo, y una vez corregido, se sigue el proceso de nuevo.');
            } elseif (preg_match('/Impresión y Firma|Imprimir|Firmar|Firmado de Enterado/i', $message)) {
                $botman->reply('Después de ser aceptado en DisSuper, el usuario que creó el documento debe imprimirlo y llevarlo para que el empleado al que pertenece lo firme de enterado. Una vez hecho esto, el documento queda almacenado sin problema.');
            } elseif (preg_match('/Cancelación de Documentos|Cancelar Documento|Cancelado|Cancelación/i', $message)) {
                $botman->reply('Los usuarios de mayor rango en DisSuper tienen el poder de cancelar documentos. Sin embargo, esta acción queda registrada en el historial con el motivo de la cancelación, quién lo canceló, y la fecha y hora de la acción.');
            } elseif (preg_match('/Filtrar Tablas|Filtrar|Exportar a Excel|Exportar a PDF|Imprimir Directo/i', $message)) {
                $botman->reply('En DisSuper, todas las tablas tienen la opción de filtrar por cualquiera de los campos de la tabla que se busque, además de que se tiene la opción de exportar la tabla a Excel, PDF, o mandar a imprimir directo para una mejor organización y gestión de la información.');
            } elseif (preg_match('/Soporte Técnico|Soporte|Ayuda|Asistencia/i', $message)) {
                $botman->reply('Para obtener soporte o ayuda en DisSuper, puedes contactar al equipo de soporte técnico a través del chat interno o enviar un correo electrónico para resolver cualquier duda o problema relacionado con la app.');
            } elseif (preg_match('/Registro de Documentos|Registrar Documento|Registro|Documento/i', $message)) {
                $botman->reply('Para registrar un documento en DisSuper, debes ir al perfil del empleado correspondiente, acceder a la sección de documentos y subir el documento llenando los campos requeridos o subiendo un PDF directamente.');
            } elseif (preg_match('/Visibilidad de Documentos|Visibilidad|Acceso|Permiso/i', $message)) {
                $botman->reply('En DisSuper, la visibilidad de los documentos puede ser configurada para determinar quién puede acceder y ver cada documento, asegurando la privacidad y confidencialidad de la información.');
            } elseif (preg_match('/Comentarios y Notas|Comentarios|Notas|Comentarios de Revisión/i', $message)) {
                $botman->reply('Durante el proceso de revisión en DisSuper, se pueden agregar comentarios y notas para proporcionar feedback y aclaraciones sobre el documento, facilitando la corrección y aprobación del mismo.');
            } elseif (preg_match('/Alertas y Recordatorios|Alertas|Recordatorios|Alertas de Revisión/i', $message)) {
                $botman->reply('DisSuper cuenta con alertas y recordatorios automáticos que te notifican sobre documentos pendientes de revisión, documentos aceptados, documentos rechazados, y otras actualizaciones importantes en tiempo real.');
            } elseif (preg_match('/Búsqueda Avanzada|Búsqueda|Filtro Avanzado|Búsqueda por Campos/i', $message)) {
                $botman->reply('En DisSuper, puedes realizar una búsqueda avanzada y filtrar las tablas por cualquiera de los campos de la tabla que se busque, facilitando la localización y gestión de la información.');
            } elseif (preg_match('/Exportar Historial|Exportar|Historial|Exportar a Excel|Exportar a PDF/i', $message)) {
                $botman->reply('DisSuper te permite exportar el historial de documentos y actividades a Excel, PDF, o imprimir directo para mantener un registro organizado y accesible de todas las acciones realizadas.');
            } elseif (preg_match('/Seguridad y Privacidad|Seguridad|Privacidad|Encriptación|Contraseñas Encriptadas/i', $message)) {
                $botman->reply('La seguridad y privacidad de la información en DisSuper es una prioridad. Todas las contraseñas están encriptadas y se utilizan medidas de seguridad avanzadas para proteger tus datos personales y documentos.');
            } elseif (preg_match('/Funcionalidades y Actualizaciones|Funcionalidades|Actualizaciones|Novedades/i', $message)) {
                $botman->reply('DisSuper se actualiza constantemente con nuevas funcionalidades y mejoras para ofrecerte una experiencia de usuario mejorada y adaptada a tus necesidades y requerimientos.');
            } elseif (preg_match('/Soporte y Asistencia|Soporte|Ayuda|Asistencia|Contacto/i', $message)) {
                $botman->reply('Para obtener soporte o asistencia en DisSuper, puedes contactar al equipo de soporte técnico a través del chat interno, enviar un correo electrónico, o acceder a la sección de ayuda para resolver cualquier duda o problema relacionado con la app.');
            } elseif (preg_match('/Notificaciones Personalizadas|Notificaciones|Personalizar Notificaciones/i', $message)) {
                $botman->reply('En DisSuper, puedes personalizar las notificaciones para recibir alertas específicas sobre documentos, actividades y actualizaciones que sean relevantes para ti, adaptándose a tus preferencias y necesidades.');
            } elseif (preg_match('/Auditoría y Control|Auditoría|Control|Registro de Actividades/i', $message)) {
                $botman->reply('DisSuper cuenta con una función de auditoría y control que registra todas las actividades y acciones realizadas en la plataforma, proporcionando un seguimiento detallado y transparente de los cambios y actualizaciones.');
            } elseif (preg_match('/Integración de Sistemas|Integración|Sistemas|API/i', $message)) {
                $botman->reply('DisSuper permite la integración con otros sistemas y aplicaciones a través de APIs, facilitando la automatización de procesos y la sincronización de datos entre diferentes plataformas.');
            } elseif (preg_match('/Acceso Móvil|Acceso|Aplicación Móvil|Dispositivos Móviles/i', $message)) {
                $botman->reply('DisSuper está disponible en dispositivos móviles con una aplicación optimizada para ofrecerte un acceso móvil rápido, fácil y seguro a todas las funcionalidades y características de la plataforma.');
            } elseif (preg_match('/Personalización de Interfaz|Personalización|Interfaz|Configuración/i', $message)) {
                $botman->reply('En DisSuper, puedes personalizar la interfaz y configurar las preferencias de visualización para adaptar la plataforma a tus necesidades y mejorar tu experiencia de usuario.');
            } 
            
            
            
            
            
            elseif (preg_match('/Formación y Capacitación|Formación|Capacitación|Tutoriales/i', $message)) {
                $botman->reply('DisSuper ofrece formación y capacitación a los usuarios para asegurar un uso efectivo y eficiente de la plataforma, proporcionando tutoriales, guías y recursos educativos para familiarizarte con todas las funcionalidades y herramientas disponibles.');
            } elseif (preg_match('/Feedback y Sugerencias|Feedback|Sugerencias|Mejoras/i', $message)) {
                $botman->reply('Valoramos tu feedback y sugerencias en DisSuper para mejorar continuamente la plataforma y adaptarla a tus necesidades y requerimientos, asegurando una experiencia de usuario satisfactoria y personalizada.');
            } elseif (preg_match('/Funcionalidades Avanzadas|Funcionalidades|Avanzadas|Características/i', $message)) {
                $botman->reply('DisSuper cuenta con funcionalidades avanzadas y características innovadoras para ofrecerte una gestión de documentos y actividades más eficiente, productiva y adaptada a las demandas actuales del mercado.');
            } elseif (preg_match('/Actualizaciones de Seguridad|Actualizaciones|Seguridad|Parches de Seguridad/i', $message)) {
                $botman->reply('En DisSuper, implementamos regularmente actualizaciones de seguridad y parches de seguridad para proteger tus datos personales, documentos y actividades de posibles amenazas y vulnerabilidades.');
            } elseif (preg_match('/Backup y Recuperación|Backup|Recuperación|Copia de Seguridad/i', $message)) {
                $botman->reply('DisSuper realiza copias de seguridad automáticas y ofrece opciones de recuperación para garantizar la integridad y disponibilidad de tus datos, documentos y configuraciones en caso de pérdida o fallo.');
            } elseif (preg_match('/Colaboración y Trabajo en Equipo|Colaboración|Trabajo en Equipo|Compartir Documentos/i', $message)) {
                $botman->reply('DisSuper facilita la colaboración y el trabajo en equipo permitiendo compartir documentos, asignar tareas, y colaborar de forma eficiente y efectiva con otros usuarios y departamentos dentro de la plataforma.');
            } elseif (preg_match('/Análisis y Reportes|Análisis|Reportes|Informes/i', $message)) {
                $botman->reply('En DisSuper, puedes generar análisis y reportes detallados sobre tus documentos, actividades y procesos para obtener insights y tomar decisiones informadas, mejorando la gestión y optimización de tus operaciones.');
            } elseif (preg_match('/Gestión de Permisos y Roles|Gestión de Permisos|Roles|Configuración de Permisos/i', $message)) {
                $botman->reply('DisSuper ofrece una gestión de permisos y roles personalizada que te permite configurar y asignar permisos específicos a los usuarios, controlando el acceso y las acciones permitidas dentro de la plataforma.');
            } elseif (preg_match('/Integración de Herramientas de Productividad|Integración|Herramientas de Productividad|Integración con Office/i', $message)) {
                $botman->reply('DisSuper se integra con las principales herramientas de productividad y suites de oficina, como Microsoft Office, Google Workspace, y otras aplicaciones, facilitando la importación y exportación de documentos y datos.');
            } elseif (preg_match('/Automatización de Procesos|Automatización|Procesos|Flujo de Trabajo/i', $message)) {
                $botman->reply('DisSuper ofrece funcionalidades de automatización de procesos y flujo de trabajo para optimizar y agilizar las tareas y actividades repetitivas, mejorando la eficiencia y productividad en la gestión de documentos y operaciones.');
            } elseif (preg_match('/Interfaz Intuitiva y Usabilidad|Interfaz Intuitiva|Usabilidad|Diseño Amigable/i', $message)) {
                $botman->reply('La interfaz de DisSuper es intuitiva y el diseño es amigable, ofreciendo una usabilidad sencilla y accesible para todos los usuarios, independientemente de su nivel de experiencia y conocimientos técnicos.');
            } elseif (preg_match('/Personalización de Informes|Personalización|Informes|Configuración de Informes/i', $message)) {
                $botman->reply('En DisSuper, puedes personalizar los informes y reportes generados para adaptarlos a tus necesidades y requerimientos específicos, seleccionando los datos, métricas y visualizaciones que deseas incluir en cada informe.');
            } elseif (preg_match('/Soporte Multilingüe|Soporte|Multilingüe|Idiomas/i', $message)) {
                $botman->reply('DisSuper ofrece soporte multilingüe y está disponible en varios idiomas para facilitar la comunicación y colaboración entre usuarios de diferentes regiones y nacionalidades, adaptándose a las necesidades globales de tu organización.');
            } elseif (preg_match('/Digitalización de Documentos|Digitalización|Documentos Electrónicos|Sin Papel/i', $message)) {
                $botman->reply('DisSuper está diseñado para facilitar la digitalización de documentos y reducir el uso de papel, ofreciendo un historial completo en formato electrónico para mejorar la organización, accesibilidad y gestión de la información.');
            } elseif (preg_match('/Agilización de Procesos|Agilización|Procesos|Rápido y Eficiente/i', $message)) {
                $botman->reply('Con DisSuper, puedes agilizar los procesos y actividades de tu organización, optimizando las tareas administrativas, automatizando flujos de trabajo y reduciendo los tiempos de respuesta y gestión de documentos.');
            } elseif (preg_match('/Notificaciones y Alertas|Notificaciones|Alertas|Información en Tiempo Real/i', $message)) {
                $botman->reply('DisSuper mantiene informados a los usuarios con notificaciones y alertas en tiempo real sobre sus actividades, tareas pendientes, documentos a revisar, y actualizaciones importantes para asegurar una comunicación efectiva y una gestión proactiva.');
            } elseif (preg_match('/Intuitivo y Fácil de Usar|Intuitivo|Usabilidad|Diseño Amigable/i', $message)) {
                $botman->reply('DisSuper se ha diseñado con una interfaz intuitiva y un diseño amigable para ofrecer a los usuarios una experiencia de uso sencilla, accesible y eficiente, permitiendo realizar sus tareas y actividades de manera intuitiva y sin complicaciones.');
            } elseif (preg_match('/Envío Automático de Correos|Envío de Correos|Correo Electrónico|Notificaciones por Correo/i', $message)) {
                $botman->reply('DisSuper facilita el envío automático de correos electrónicos para informar, notificar y mantener actualizados a los usuarios sobre sus actividades, tareas asignadas, documentos a revisar, y otras actualizaciones importantes de forma rápida y efectiva.');
            } elseif (preg_match('/Acceso Remoto y Móvil|Acceso Remoto|Acceso Móvil|Trabajo desde Cualquier Lugar/i', $message)) {
                $botman->reply('DisSuper permite el acceso remoto y móvil para que los usuarios puedan realizar sus tareas y actividades desde cualquier lugar y dispositivo, ofreciendo flexibilidad, movilidad y adaptabilidad a las necesidades y estilos de trabajo actuales.');
            } elseif (preg_match('/Seguridad y Confidencialidad|Seguridad|Confidencialidad|Protección de Datos/i', $message)) {
                $botman->reply('La seguridad y confidencialidad de la información en DisSuper es una prioridad, implementando medidas de protección de datos y encriptación para garantizar la integridad, privacidad y seguridad de tus documentos, actividades y comunicaciones.');
            } elseif (preg_match('/Optimización de Recursos|Optimización|Recursos|Eficiencia Operativa/i', $message)) {
                $botman->reply('DisSuper contribuye a la optimización de recursos y la eficiencia operativa de tu organización, permitiendo una mejor gestión y aprovechamiento de los recursos humanos, materiales y tecnológicos a través de procesos automatizados y centralizados.');
            } elseif (preg_match('/¿Cómo puedo registrar un nuevo documento?|Registrar Documento|Nuevo Documento/i', $message)) {
                $botman->reply('Para registrar un nuevo documento, debes ir al perfil del empleado correspondiente, acceder a la sección de documentos y subir el documento llenando los campos requeridos o subiendo un PDF directamente.');
            } elseif (preg_match('/¿Cómo puedo revisar mis notificaciones?|Revisar Notificaciones|Notificaciones Pendientes/i', $message)) {
                $botman->reply('Puedes revisar tus notificaciones en la sección de notificaciones de la plataforma, donde encontrarás todas las alertas, mensajes y actualizaciones importantes relacionadas con tus actividades y tareas asignadas.');
            } elseif (preg_match('/¿Cómo puedo cambiar mi contraseña?|Cambiar Contraseña|Restablecer Contraseña/i', $message)) {
                $botman->reply('Para cambiar tu contraseña, debes ir a la sección de configuración de tu perfil, seleccionar la opción de cambiar contraseña y seguir los pasos indicados para establecer una nueva contraseña segura y confidencial.');
            } elseif (preg_match('/¿Cómo puedo acceder a mi historial de documentos?|Historial de Documentos|Ver Historial/i', $message)) {
                $botman->reply('Puedes acceder a tu historial de documentos en la sección correspondiente de tu perfil, donde encontrarás un registro completo de todos los documentos que has registrado, revisado y gestionado en la plataforma.');
            }
            
            
            
            
            
            elseif (preg_match('/¿Cómo puedo solicitar soporte técnico?|Soporte Técnico|Ayuda/i', $message)) {
                $botman->reply('Para solicitar soporte técnico, puedes contactar al equipo de soporte a través del chat interno de la plataforma, enviar un correo electrónico al equipo de soporte técnico, o acceder a la sección de ayuda para obtener asistencia y resolver cualquier duda o problema relacionado con la plataforma.');
            } elseif (preg_match('/¿Cómo puedo exportar un informe?|Exportar Informe|Generar Informe/i', $message)) {
                $botman->reply('Para exportar un informe, debes ir a la sección correspondiente de informes y seleccionar la opción de exportar informe, donde podrás elegir el formato deseado (Excel, PDF) y personalizar el informe según tus necesidades y requerimientos.');
            } elseif (preg_match('/¿Cómo puedo personalizar mis notificaciones?|Personalizar Notificaciones|Configuración de Notificaciones/i', $message)) {
                $botman->reply('Puedes personalizar tus notificaciones en la sección de configuración de notificaciones, donde podrás seleccionar y configurar las alertas, mensajes y actualizaciones que deseas recibir, adaptándose a tus preferencias y necesidades específicas.');
            } elseif (preg_match('/¿Cómo puedo solicitar una capacitación?|Capacitación|Solicitar Capacitación/i', $message)) {
                $botman->reply('Para solicitar una capacitación, puedes contactar al departamento de recursos humanos o al equipo de soporte técnico para coordinar y programar una sesión de capacitación personalizada según tus necesidades y requerimientos.');
            } elseif (preg_match('/¿Cómo puedo verificar mis tareas asignadas?|Tareas Asignadas|Verificar Tareas/i', $message)) {
                $botman->reply('Puedes verificar tus tareas asignadas en la sección de tareas de la plataforma, donde encontrarás un listado completo de las tareas pendientes, en proceso y completadas, así como la información detallada y los plazos de entrega de cada tarea.');
            } elseif (preg_match('/como añado un indicador/i', $message)) {
                $botman->reply('Para añadir un indicador necesitas tener los permisos necesarios. Si los tienes solo tienes que is al apartado indicadores y añadirlo');
            }
            elseif (preg_match('/como veo mi sueldo/i', $message)) {
                $botman->reply('Puedes revisar tu contrato, tu nomina o preguntarle a tu superior');
            } elseif (preg_match('/un documento no me llego/i', $message)) {
                $botman->reply('Si un documento generado por otra persona no te ha llegado pidele que se asegure si lo mando a la persona correcta, si lo hizo reporta el problema con el administrador del sistema y dale la informacion del documento');
            } elseif (preg_match('/orden llevan los documentos/i', $message)) {
                $botman->reply('Los documentos se generan en el siguiente orden: 2 rendiciones de cuentas, 1 llamada de atencion y 1 acta administrativa ');
            } elseif (preg_match('/orden se generan los documentos/i', $message)) {
                $botman->reply('Los documentos se generan en el siguiente orden: 2 rendiciones de cuentas, 1 llamada de atencion y 1 acta administrativa ');
            } elseif (preg_match('/que es una llamada de atencion/i', $message)) {
                $botman->reply('Una llamada de atencion es un documento que se genera cuando un empleado ha fallado en cumplir sus indicadores en 3 o mas labores');
            } elseif (preg_match('/rendicion de cuentas/i', $message)) {
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
            }elseif (preg_match('/que es una zona/iu', $message)) {
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
            }
            
            
            
            
            
            elseif (preg_match('/ver roles/iu', $message)) {
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
            } elseif (preg_match('/para que es el boton ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/para que es ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/que sirve ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/que sirve el boton ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/no encuentro una opcion/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            } elseif (preg_match('/no encuentro un boton/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            } elseif (preg_match('/cuales son los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde ver los terminos y condiciones/iu', $message)) {
                $botman->reply('');
            }
            
            
            
            
            
            elseif (preg_match('/RPE repetido/iu', $message)) {
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
            } elseif (preg_match('/donde registrar un usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar un usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/donde añadir un usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir un usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir usuarios/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir usuarios/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear usuarios/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como crear usuarios/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear usuarios/iu', $message)) {
                $botman->reply('');
            }
            
            
            
            
            
            elseif (preg_match('/donde crear un usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como crear un usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar usuarios/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/donde agregar un usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar usuarios/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar un usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo agregar un usuario/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/puedo agregar usuarios/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar empleados/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar empleados/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde registrar un empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar un empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo registrar un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir empleados/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir empleados/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir empleados/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde añadir un empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir un empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde crear empleados/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como crear empleados/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear empleados/iu', $message)) {
                $botman->reply('');
            } 
            
            
            
            
            
            elseif (preg_match('/donde agrego un empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como crear un empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear un empleado/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/donde agregar empleados/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/donde agregar un empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar empleados/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar un empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/¿Dónde puedo encontrar mi código de ética?|Código de Ética|Ver Código de Ética/i', $message)) {
                $botman->reply('Tu código de ética te fue enviado por correo electrónico cuando te registraste en la plataforma. Si necesitas consultarlo de nuevo, puedes acceder a tu correo electrónico o contactar al departamento de recursos humanos para obtener una copia.');
            } elseif (preg_match('/¿Cómo puedo exportar el historial y documentos de un empleado?|Exportar Historial|Exportar Documentos/i', $message)) {
                $botman->reply('Para exportar el historial y documentos de un empleado, debes ir al listado de empleados, seleccionar el empleado correspondiente, acceder a la sección de documentos y utilizar la opción de exportar para generar un informe completo en formato deseado (Excel, PDF) con toda la información y documentos asociados al empleado.');
            } elseif (preg_match('/¿Cómo puedo restablecer mi contraseña?|Restablecer Contraseña|Olvidé mi Contraseña/i', $message)) {
                $botman->reply('Para restablecer tu contraseña, debes ir a la sección de inicio de sesión de la plataforma, seleccionar la opción de "Olvidé mi contraseña" e ingresar tu dirección de correo electrónico para recibir las instrucciones y el enlace de restablecimiento de contraseña.');
            } elseif (preg_match('/¿Cómo puedo generar un acta administrativa?|Generar Acta|Acta Administrativa/i', $message)) {
                $botman->reply('Para generar un acta administrativa, debes ir al perfil correspondiente, acceder a la sección de actas administrativas y seguir los pasos indicados para completar y enviar el acta administrativa de forma correcta y conforme a los procedimientos establecidos.');
            } elseif (preg_match('/¿Cómo puedo subir un documento de forma manual?|Subir Documento|Documento Manual/i', $message)) {
                $botman->reply('Para subir un documento de forma manual, debes ir al perfil correspondiente, acceder a la sección de documentos, seleccionar la opción de subir documento, llenar los campos requeridos y seguir los pasos indicados para completar y enviar el documento de forma correcta.');
            } elseif (preg_match('/¿Cómo puedo verificar el estado de un documento enviado a revisión?|Estado de Documento|Verificar Estado/i', $message)) {
                $botman->reply('Puedes verificar el estado de un documento enviado a revisión en la sección correspondiente de documentos, donde encontrarás el estado actual del documento, los responsables de revisión asignados y el historial de acciones realizadas sobre el documento durante el proceso de revisión.');
            } elseif (preg_match('/¿Cómo puedo redirigir un documento a otro usuario para revisión?|Redirigir Documento|Redirigir Revisión/i', $message)) {
                $botman->reply('Para redirigir un documento a otro usuario para revisión, debes ir a la sección correspondiente de documentos, seleccionar el documento enviado a revisión, elegir la opción de redirigir y seleccionar al nuevo usuario asignado para la revisión del documento.');
            } elseif (preg_match('/¿Cómo puedo contactar al soporte técnico?|Contactar Soporte|Soporte Técnico/i', $message)) {
                $botman->reply('Para contactar al soporte técnico, puedes utilizar el chat interno de la plataforma, enviar un correo electrónico al equipo de soporte técnico, o acceder a la sección de ayuda y soporte para obtener asistencia y resolver cualquier duda o problema relacionado con la plataforma.');
            } elseif (preg_match('/¿Cómo puedo cancelar un documento?|Cancelar Documento|Documento Cancelado/i', $message)) {
                $botman->reply('Para cancelar un documento, debes ir al perfil correspondiente, acceder a la sección de documentos, seleccionar el documento que deseas cancelar, elegir la opción de cancelar y proporcionar el motivo y la justificación para cancelar el documento.');
            } elseif (preg_match('/¿Cómo puedo filtrar el listado de empleados por departamento?|Filtrar Listado|Filtrar por Departamento/i', $message)) {
                $botman->reply('Puedes filtrar el listado de empleados por departamento en la sección correspondiente de listado de empleados, donde encontrarás opciones de filtrado por departamento, cargo, estado, y otros criterios para personalizar y optimizar la visualización del listado de empleados.');
            } elseif (preg_match('/¿Cómo puedo exportar el historial de un empleado?|Exportar Historial Empleado|Historial de Empleado/i', $message)) {
                $botman->reply('Para exportar el historial de un empleado, debes ir al perfil correspondiente, acceder a la sección de historial de empleados, seleccionar el empleado que deseas exportar y seguir los pasos indicados para exportar el historial completo del empleado en formato deseado (Excel, PDF).');
            } elseif (preg_match('/¿Cuál es la misión de la CFE?|Misión de CFE/i', $message)) {
                $botman->reply('La misión de la Comisión Federal de Electricidad (CFE) es generar, transmitir, distribuir y comercializar energía eléctrica de calidad, confiable y segura, contribuyendo al desarrollo sustentable y bienestar de la sociedad mexicana.');
            } elseif (preg_match('/¿Cuál es la visión de la CFE?|Visión de CFE/i', $message)) {
                $botman->reply('La visión de la Comisión Federal de Electricidad (CFE) es ser una empresa líder en el sector eléctrico, reconocida por su excelencia operativa, innovación tecnológica y compromiso con el desarrollo sostenible, impulsando el crecimiento económico y social de México.');
            } elseif (preg_match('/¿Qué es el Plan Nacional de Desarrollo Energético?|Plan Nacional de Desarrollo Energético/i', $message)) {
                $botman->reply('El Plan Nacional de Desarrollo Energético es un documento estratégico y programático que establece las políticas, objetivos, metas y acciones prioritarias para el desarrollo integral y sustentable del sector energético en México, incluyendo la generación, transmisión, distribución y comercialización de energía eléctrica.');
            } elseif (preg_match('/¿Cuál es el objetivo de la CFE en relación con la sustentabilidad?|Objetivo de CFE en Sustentabilidad/i', $message)) {
                $botman->reply('El objetivo de la Comisión Federal de Electricidad (CFE) en relación con la sustentabilidad es promover y adoptar prácticas y tecnologías sustentables en sus operaciones y proyectos, minimizando el impacto ambiental, optimizando el uso de recursos naturales y contribuyendo a la mitigación del cambio climático.');
            } elseif (preg_match('/¿Cuál es la importancia de la eficiencia energética para la CFE?|Eficiencia Energética en CFE/i', $message)) {
                $botman->reply('La eficiencia energética es de gran importancia para la Comisión Federal de Electricidad (CFE) ya que permite maximizar la utilización de los recursos energéticos disponibles, reducir los costos operativos, mejorar la competitividad, satisfacer la demanda de energía de manera sostenible y cumplir con los compromisos de reducción de emisiones de gases de efecto invernadero.');
            } elseif (preg_match('/¿Qué es el Fondo de Sustentabilidad Energética de la CFE?|Fondo de Sustentabilidad Energética/i', $message)) {
                $botman->reply('El Fondo de Sustentabilidad Energética de la Comisión Federal de Electricidad (CFE) es un mecanismo financiero creado para apoyar y promover proyectos y programas de eficiencia energética, energías renovables y desarrollo sustentable en el sector eléctrico, contribuyendo a la diversificación de la matriz energética, la seguridad energética y la mitigación del cambio climático.');
            } elseif (preg_match('/¿Qué es el IMSS y cuál es su relación con la CFE?|IMSS y CFE/i', $message)) {
                $botman->reply('El IMSS (Instituto Mexicano del Seguro Social) es una entidad gubernamental encargada de administrar el sistema de seguridad social en México, proporcionando servicios de salud, pensiones y prestaciones a los trabajadores y sus familias. La CFE tiene una relación laboral con el IMSS para garantizar la protección y bienestar de sus empleados, cumpliendo con las obligaciones legales y proporcionando acceso a servicios médicos y sociales.');
            }
            
            
            
            
            
            elseif (preg_match('/¿Cuál es la política de diversidad e inclusión de la CFE?|Diversidad e Inclusión en CFE/i', $message)) {
                $botman->reply('La Comisión Federal de Electricidad (CFE) promueve una política de diversidad e inclusión que valora y respeta la diversidad de género, edad, origen étnico, discapacidad, orientación sexual, religión y experiencia laboral de sus empleados, fomentando un ambiente de trabajo inclusivo, equitativo y libre de discriminación, donde todos los empleados puedan desarrollar su potencial y contribuir al éxito de la organización.');
            } elseif (preg_match('/¿Cómo puedo acceder a los servicios de salud del IMSS como empleado de la CFE?|Servicios de Salud IMSS/i', $message)) {
                $botman->reply('Como empleado de la Comisión Federal de Electricidad (CFE), puedes acceder a los servicios de salud del IMSS a través de tu afiliación al Instituto Mexicano del Seguro Social, proporcionando tu número de seguridad social y cumpliendo con los requisitos de registro y actualización de datos personales en el sistema del IMSS.');
            } elseif (preg_match('/¿Qué es el SAT y cuál es su relación con la CFE?|SAT y CFE/i', $message)) {
                $botman->reply('El SAT (Servicio de Administración Tributaria) es una entidad gubernamental encargada de administrar y supervisar el sistema tributario en México, recaudando impuestos, derechos y contribuciones fiscales para financiar el gasto público y garantizar el cumplimiento de las obligaciones fiscales. La CFE tiene una relación con el SAT para cumplir con las obligaciones fiscales, presentar declaraciones, pagar impuestos y contribuir al desarrollo económico y social del país.');
            } elseif (preg_match('/¿Qué es el programa de capacitación y desarrollo de la CFE?|Programa de Capacitación y Desarrollo CFE/i', $message)) {
                $botman->reply('La Comisión Federal de Electricidad (CFE) ofrece un programa de capacitación y desarrollo profesional para sus empleados, diseñado para fortalecer y actualizar las competencias, habilidades y conocimientos técnicos, gerenciales y técnicos especializados requeridos en el sector eléctrico, fomentando la excelencia, la innovación y la mejora continua en las operaciones y servicios de la organización.');
            } elseif (preg_match('/¿Cómo puedo participar en el programa de voluntariado de la CFE?|Programa de Voluntariado CFE/i', $message)) {
                $botman->reply('Puedes participar en el programa de voluntariado de la Comisión Federal de Electricidad (CFE) a través de la inscripción y registro en las convocatorias y proyectos de voluntariado disponibles, colaborando en actividades y proyectos sociales, ambientales y comunitarios, contribuyendo al bienestar y desarrollo de las comunidades y sectores vulnerables atendidos por la organización.');
            } elseif (preg_match('/¿Qué es el Consejo de Administración de la CFE?|Consejo de Administración CFE/i', $message)) {
                $botman->reply('El Consejo de Administración de la Comisión Federal de Electricidad (CFE) es el órgano colegiado responsable de la toma de decisiones estratégicas, supervisión y dirección de la organización, conformado por representantes del gobierno, sector empresarial, academia y sociedad civil, que guían y orientan la gestión, operación y políticas de la CFE, garantizando la transparencia, rendición de cuentas y cumplimiento de los objetivos institucionales.');
            } elseif (preg_match('/¿Qué es el Fideicomiso para el Ahorro de Energía Eléctrica (FIDE)?|FIDE y CFE/i', $message)) {
                $botman->reply('El Fideicomiso para el Ahorro de Energía Eléctrica (FIDE) es una entidad gubernamental dedicada a promover y financiar proyectos y programas de eficiencia energética y uso racional de la energía en México, impulsando la adopción de tecnologías y prácticas sustentables, y colaborando con la Comisión Federal de Electricidad (CFE) en la implementación de acciones de ahorro y eficiencia energética en el sector eléctrico y el mercado energético nacional.');
            } elseif (preg_match('/¿Cuál es la política de ética y valores de la CFE?|Política de Ética y Valores CFE/i', $message)) {
                $botman->reply('La Comisión Federal de Electricidad (CFE) promueve una política de ética y valores que guía y orienta la conducta, responsabilidad y compromiso de sus empleados, directivos y colaboradores en el ejercicio de sus funciones y actividades laborales, fomentando la integridad, honestidad, transparencia, respeto, equidad y profesionalismo en todas las acciones y decisiones realizadas en beneficio de la organización y la sociedad mexicana.');
            } elseif (preg_match('/¿Cómo puedo obtener información sobre las licitaciones y contrataciones de la CFE?|Licitaciones y Contrataciones CFE/i', $message)) {
                $botman->reply('Puedes obtener información sobre las licitaciones y contrataciones de la Comisión Federal de Electricidad (CFE) a través del portal oficial de compras y adquisiciones de la CFE, donde se publican las convocatorias, bases, requisitos, procedimientos, resultados y documentación relacionada con los procesos de licitación, adjudicación y contratación de bienes, servicios y obras para la operación y proyectos de la organización.');
            } elseif (preg_match('/¿Qué es el Código de Ética de la CFE?|Código de Ética CFE/i', $message)) {
                $botman->reply('El Código de Ética de la CFE es un conjunto de principios, valores y normas que guían la conducta y responsabilidad de los empleados y colaboradores en su trabajo.');
            } elseif (preg_match('/¿Para qué sirve el Código de Ética de la CFE?|Utilidad del Código de Ética CFE/i', $message)) {
                $botman->reply('El Código de Ética de la CFE sirve para promover la integridad, honestidad, transparencia y profesionalismo en todas las actividades y decisiones laborales.');
            } elseif (preg_match('/¿Cuáles son los principios del Código de Ética de la CFE?|Principios del Código de Ética CFE/i', $message)) {
                $botman->reply('Los principios del Código de Ética de la CFE incluyen la integridad, honestidad, transparencia, respeto, responsabilidad, lealtad y compromiso.');
            } elseif (preg_match('/¿Qué responsabilidades tienen los empleados según el Código de Ética de la CFE?|Responsabilidades del Código de Ética CFE/i', $message)) {
                $botman->reply('Según el Código de Ética de la CFE, los empleados tienen la responsabilidad de actuar con integridad, honestidad, transparencia y respeto en su trabajo.');
            } elseif (preg_match('/¿Qué conductas están prohibidas según el Código de Ética de la CFE?|Conductas prohibidas Código de Ética CFE/i', $message)) {
                $botman->reply('El Código de Ética de la CFE prohíbe conductas como el fraude, corrupción, soborno, conflicto de interés, acoso laboral, discriminación y mal uso de recursos.');
            } elseif (preg_match('/¿Cómo se promueve la cultura ética en la CFE?|Promoción de cultura ética CFE/i', $message)) {
                $botman->reply('La CFE promueve la cultura ética a través de capacitaciones, comunicación del Código de Ética, reconocimiento de conductas ejemplares y canales de denuncia.');
            } elseif (preg_match('/¿Qué pasa si no se sigue el Código de Ética de la CFE?|Sanciones por no seguir Código de Ética CFE/i', $message)) {
                $botman->reply('Si no se sigue el Código de Ética de la CFE, pueden aplicarse sanciones disciplinarias y consecuencias laborales.');
            } elseif (preg_match('/¿Qué es la integridad?|Integridad/i', $message)) {
                $botman->reply('La integridad se refiere a actuar con rectitud, honradez y honestidad en todas las actividades laborales.');
            } elseif (preg_match('/¿Qué significa el compromiso?|Compromiso/i', $message)) {
                $botman->reply('El compromiso implica dedicación, responsabilidad y lealtad hacia la organización, sus objetivos y la sociedad.');
            } elseif (preg_match('/¿Qué es la transparencia?|Transparencia/i', $message)) {
                $botman->reply('La transparencia se refiere a actuar con claridad, franqueza y apertura en las actividades laborales, evitando la ocultación de información.');
            } elseif (preg_match('/¿Qué se entiende por respeto?|Respeto/i', $message)) {
                $botman->reply('El respeto implica reconocer y valorar los derechos, opiniones, diferencias y dignidad de las personas en el entorno laboral.');
            } elseif (preg_match('/¿Qué es la lealtad?|Lealtad/i', $message)) {
                $botman->reply('La lealtad se refiere a actuar con fidelidad, compromiso y apoyo hacia la organización, sus valores y objetivos, evitando conflictos de interés.');
            } elseif (preg_match('/¿Qué se considera un conflicto de interés?|Conflicto de interés/i', $message)) {
                $botman->reply('Un conflicto de interés se produce cuando los intereses personales, familiares o financieros de un empleado afectan o pueden afectar su objetividad, imparcialidad y responsabilidad en el trabajo.');
            } elseif (preg_match('/¿Cómo se reportan las violaciones al Código de Ética?|Reporte de violaciones/i', $message)) {
                $botman->reply('Las violaciones al Código de Ética se pueden reportar a través de los canales de denuncia y reporte establecidos por la organización, garantizando la confidencialidad, protección y seguimiento de la información proporcionada.');
            } elseif (preg_match('/¿Qué sucede después de reportar una violación?|Proceso después de reportar violación/i', $message)) {
                $botman->reply('Después de reportar una violación al Código de Ética, se realiza una investigación, evaluación y análisis de la situación, aplicando las medidas, sanciones y acciones correctivas correspondientes para garantizar el cumplimiento y respeto de los principios éticos y de conducta de la organización.');
            } 
            
            
            
            
            
            elseif (preg_match('/¿Qué es la confidencialidad?|Confidencialidad/i', $message)) {
                $botman->reply('La confidencialidad se refiere a proteger y salvaguardar la información, datos, documentos y comunicaciones internas y externas de la organización, evitando su divulgación, acceso no autorizado y uso indebido.');
            } elseif (preg_match('/¿Qué se entiende por acoso laboral?|Acoso laboral/i', $message)) {
                $botman->reply('El acoso laboral se define como cualquier conducta, acción, comportamiento, comentario o situación que cause intimidación, hostigamiento, humillación, discriminación o maltrato psicológico en el entorno de trabajo.');
            } elseif (preg_match('/¿Cómo se añade un nuevo usuario en DisSuper?|Añadir nuevo usuario/i', $message)) {
                $botman->reply('Para añadir un nuevo usuario en DisSuper, se genera automáticamente su perfil de empleado al agregarlo.');
            } elseif (preg_match('/¿Qué se puede hacer en la plataforma DisSuper?|funcionalidades/i', $message)) {
                $botman->reply('En DisSuper se pueden añadir usuarios nuevos, modificar perfiles de empleados, agregar indicadores, gestionar puestos y zonas de trabajo, asignar actividades a puestos, y realizar acciones como rendiciones de cuentas y llamadas de atención.');
            } elseif (preg_match('/¿Qué son los indicadores en DisSuper?|Indicadores en DisSuper/i', $message)) {
                $botman->reply('Los indicadores en DisSuper son aspectos a calificar en una llamada de atención o rendición de cuentas, tienen una clave específica y un valor mínimo aceptable.');
            } elseif (preg_match('/¿Cómo se gestionan los puestos en DisSuper?|Gestionar puestos /i', $message)) {
                $botman->reply('En DisSuper se pueden agregar, modificar y eliminar puestos, los cuales están ligados a la zona de trabajo y tienen actividades de puesto asociadas.');
            } elseif (preg_match('/¿Qué son las actividades de puesto en DisSuper?|Actividades de puesto/i', $message)) {
                $botman->reply('Las actividades de puesto en DisSuper son tareas específicas relacionadas con un puesto de trabajo, se pueden agregar, modificar y eliminar, y están ligadas a los puestos existentes.');
            } elseif (preg_match('/¿Cómo se gestionan las zonas en DisSuper?|Gestionar zonas|agregar zonas/i', $message)) {
                $botman->reply('En DisSuper se pueden agregar las zonas donde se encuentra un empleado, y cada empleado tiene asignada al menos una zona.');
            } elseif (preg_match('/¿Qué son los roles en DisSuper?|Roles/i', $message)) {
                $botman->reply('Los roles en DisSuper describen un usuario y tienen asignadas funcionalidades específicas, complementando la información de actividades, contratos y zonas.');
            } elseif (preg_match('/¿Cómo se actualiza la información de un empleado en DisSuper?|Actualizar información de empleado/i', $message)) {
                $botman->reply('La información de un empleado en DisSuper se puede actualizar en la sección de su perfil, o un supervisor puede modificar los datos en caso de errores.');
            } elseif (preg_match('/¿Cómo se asignan actividades a un puesto en DisSuper?|Asignar actividades a puesto/i', $message)) {
                $botman->reply('En DisSuper, se asignan actividades a un puesto específico desde la sección de actividades de puesto, donde se pueden seleccionar y añadir nuevas tareas relacionadas con ese puesto.');
            } elseif (preg_match('/¿Qué es una rendición de cuentas en DisSuper?|Rendición de cuentas/i', $message)) {
                $botman->reply('La rendición de cuentas en DisSuper es un proceso para presentar y justificar las acciones y resultados obtenidos en un periodo determinado, asegurando la transparencia y responsabilidad en el desempeño laboral.');
            } elseif (preg_match('/¿Cómo se realiza una llamada de atención en DisSuper?|Llamada de atencion/i', $message)) {
                $botman->reply('En DisSuper, se realiza una llamada de atención seleccionando el indicador correspondiente y registrando los detalles y observaciones necesarias, para identificar y corregir las áreas de mejora en el desempeño laboral.');
            } elseif (preg_match('/¿Qué es un contrato en DisSuper?|Contrato/i', $message)) {
                $botman->reply('Un contrato en DisSuper es un acuerdo formal que establece las condiciones, responsabilidades, obligaciones y derechos entre el empleado y la organización, garantizando el cumplimiento de las normas y políticas de la empresa.');
            } elseif (preg_match('/¿Cómo se agregan contratos en DisSuper?|Agregar contratos /i', $message)) {
                $botman->reply('En DisSuper, se pueden agregar nuevos contratos desde la sección correspondiente, ingresando la información requerida y especificando las condiciones y términos del acuerdo laboral.');
            } elseif (preg_match('/¿Qué son las zonas de trabajo en DisSuper?|Zonas de trabajo /i', $message)) {
                $botman->reply('Las zonas de trabajo en DisSuper representan las áreas geográficas o departamentales donde un empleado realiza sus actividades laborales, y cada empleado tiene asignada al menos una zona específica.');
            } elseif (preg_match('/¿Cómo se gestionan los roles en DisSuper?|Gestionar roles|agregar roles/i', $message)) {
                $botman->reply('En DisSuper, se gestionan los roles de usuario desde la sección de roles, asignando funcionalidades y permisos específicos a cada tipo de usuario, de acuerdo con sus responsabilidades y actividades laborales.');
            } elseif (preg_match('/¿Qué es un supervisor en DisSuper?|Supervisor/i', $message)) {
                $botman->reply('Un supervisor en DisSuper es un usuario con permisos especiales para gestionar y supervisar las actividades, perfiles, contratos, roles y rendiciones de cuentas de los empleados, asegurando el cumplimiento de las normas y políticas de la empresa.');
            } elseif (preg_match('/¿Cómo se realiza una revisión de documentos?|Revisión de documentos/i', $message)) {
                $botman->reply('En DisSuper, se realiza una revisión de documentos seleccionando el documento correspondiente, verificando la información y detalles proporcionados, y actualizando el estado del documento según los resultados de la revisión.');
            } elseif (preg_match('/¿Qué es un documento en DisSuper?|Documento/i', $message)) {
                $botman->reply('Un documento en DisSuper es un registro electrónico que contiene información, datos, contratos, rendiciones de cuentas, llamadas de atención y otros detalles relacionados con las actividades laborales y responsabilidades de los empleados.');
            } elseif (preg_match('/¿Cómo se exporta información en DisSuper?|Exportar información/i', $message)) {
                $botman->reply('En DisSuper, se exporta información seleccionando la opción de exportar en la sección correspondiente, eligiendo el formato deseado (Excel, PDF) y descargando el archivo con la información requerida.');
            } elseif (preg_match('/¿Qué es un perfil de empleado en DisSuper?|Perfil de empleado/i', $message)) {
                $botman->reply('Un perfil de empleado en DisSuper es una sección que contiene la información personal, laboral, contratos, zonas, roles y actividades asignadas a un empleado específico, proporcionando una visión completa y actualizada de su desempeño y responsabilidades.');
            } elseif (preg_match('/¿Cómo se elimina un usuario?|Eliminar usuario/i', $message)) {
                $botman->reply('Para eliminar un usuario, se accede a la sección de gestión de usuarios, se selecciona el usuario correspondiente y se confirma la eliminación.');
            } elseif (preg_match('/¿Qué es un indicador de rendimiento?|Indicador de rendimiento/i', $message)) {
                $botman->reply('Un indicador de rendimiento es una métrica o medida que evalúa el desempeño y cumplimiento de objetivos de un empleado, ayudando a identificar áreas de mejora y realizar acciones correctivas.');
            } elseif (preg_match('/¿Cómo se gestionan las actividades?|Gestionar actividades/i', $message)) {
                $botman->reply('Las actividades se gestionan desde la sección correspondiente, donde se pueden agregar, modificar y eliminar tareas específicas asignadas a cada puesto de trabajo.');
            } elseif (preg_match('/¿Qué es un puesto de trabajo?|Puesto de trabajo/i', $message)) {
                $botman->reply('Un puesto de trabajo es una posición específica dentro de la organización, con responsabilidades, funciones y actividades asignadas, y está ligado a una zona de trabajo y a un conjunto de actividades de puesto.');
            } elseif (preg_match('/¿Cómo se asigna un contrato a un empleado?|Asignar contrato a empleado/i', $message)) {
                $botman->reply('Para asignar un contrato a un empleado, se selecciona el empleado correspondiente y se añade el contrato desde la sección de contratos, especificando los términos y condiciones del acuerdo laboral.');
            } elseif (preg_match('/¿Qué es un rol de usuario?|Rol de usuario/i', $message)) {
                $botman->reply('Un rol de usuario define las funcionalidades, permisos y accesos que tiene un usuario dentro de la plataforma, permitiendo personalizar las acciones y tareas que puede realizar de acuerdo con su perfil y responsabilidades.');
            } elseif (preg_match('/¿Cómo se modifica un perfil de empleado?|Modificar perfil de empleado/i', $message)) {
                $botman->reply('Un perfil de empleado se modifica desde la sección de perfiles de empleado, actualizando la información personal, laboral, contratos, zonas, roles y actividades asignadas según sea necesario.');
            } elseif (preg_match('/¿Qué es una zona de trabajo?|Zona de trabajo/i', $message)) {
                $botman->reply('Una zona de trabajo es una ubicación geográfica o área departamental donde un empleado realiza sus actividades laborales, y cada empleado tiene asignada al menos una zona específica.');
            } elseif (preg_match('/¿Cómo se realiza una revisión de roles?|Revisión de roles/i', $message)) {
                $botman->reply('Para realizar una revisión de roles, se selecciona el rol de usuario correspondiente, se verifican las funcionalidades y permisos asignados, y se actualiza la información según los cambios requeridos.');
            } elseif (preg_match('/¿Qué es un documento de rendición de cuentas?|Documento de rendición de cuentas/i', $message)) {
                $botman->reply('Un documento de rendición de cuentas es un registro detallado que presenta y justifica las acciones, resultados y cumplimiento de objetivos de un empleado en un periodo determinado, asegurando la transparencia y responsabilidad en el desempeño laboral.');
            }
        
        
        
        
        
            elseif (preg_match('/¿Cómo se realiza una revisión de contratos?|Revisión de contratos/i', $message)) {
                $botman->reply('Para realizar una revisión de contratos, se selecciona el contrato correspondiente, se verifican los términos, condiciones y detalles del acuerdo laboral, y se actualiza la información según los cambios requeridos.');
            } elseif (preg_match('/¿Qué es un supervisor de zona?|Supervisor de zona/i', $message)) {
                $botman->reply('Un supervisor de zona es un usuario con permisos especiales para gestionar y supervisar las actividades, perfiles, contratos, roles y rendiciones de cuentas de los empleados asignados a una zona específica, garantizando el cumplimiento de las normas y políticas de la empresa en esa área geográfica.');
            } elseif (preg_match('/¿Cómo se realiza una revisión de actividades?|Revisión de actividades/i', $message)) {
                $botman->reply('Para realizar una revisión de actividades, se selecciona la actividad correspondiente, se verifica la información y los detalles de la tarea asignada, y se actualiza el estado de la actividad según los cambios requeridos.');
            } elseif (preg_match('/¿Qué es un reporte de rendimiento?|Reporte de rendimiento/i', $message)) {
                $botman->reply('Un reporte de rendimiento es un documento que presenta y analiza las métricas, resultados y cumplimiento de objetivos de un empleado o equipo de trabajo en un periodo determinado, proporcionando insights y recomendaciones para mejorar el desempeño laboral.');
            } elseif (preg_match('/¿Cómo se gestionan las zonas de trabajo?|Gestionar zonas de trabajo/i', $message)) {
                $botman->reply('Las zonas de trabajo se gestionan desde la sección correspondiente, donde se pueden agregar, modificar y eliminar las ubicaciones geográficas o áreas departamentales asignadas a cada empleado, garantizando una distribución eficiente de las responsabilidades laborales.');
            } elseif (preg_match('/¿Qué es una llamada de atención?|Llamada de atención/i', $message)) {
                $botman->reply('Una llamada de atención es un proceso formal que identifica y comunica a un empleado sobre áreas de mejora, errores o incumplimientos en su desempeño laboral, con el objetivo de corregir y mejorar su rendimiento en la empresa.');
            } elseif (preg_match('/¿Cómo se realiza una revisión de indicadores de rendimiento?|Revisión de indicadores de rendimiento/i', $message)) {
                $botman->reply('Para realizar una revisión de indicadores de rendimiento, se selecciona el indicador correspondiente, se analiza la métrica o medida evaluada, y se compara con los objetivos y metas establecidos, identificando áreas de mejora y oportunidades de optimización.');
            } elseif (preg_match('/¿Qué es un contrato de trabajo?|Contrato de trabajo/i', $message)) {
                $botman->reply('Un contrato de trabajo es un acuerdo legal entre el empleado y la empresa, que establece las condiciones, responsabilidades, derechos y obligaciones de ambas partes, garantizando el cumplimiento de las normas laborales y el respeto de los derechos laborales del empleado.');
            } elseif (preg_match('/¿Cómo se añaden actividades a un puesto de trabajo?|Añadir actividades a un puesto de trabajo/i', $message)) {
                $botman->reply('Para añadir actividades a un puesto de trabajo, se selecciona el puesto correspondiente y se agregan las tareas específicas desde la sección de actividades de puesto, especificando las responsabilidades y funciones asignadas a cada actividad.');
            } elseif (preg_match('/¿Qué es un rol de supervisor?|Rol de supervisor/i', $message)) {
                $botman->reply('Un rol de supervisor es una posición con permisos especiales para gestionar, supervisar y coordinar las actividades, equipos de trabajo y proyectos de un área específica o departamento, garantizando el cumplimiento de los objetivos y metas establecidos.');
            } elseif (preg_match('/¿Cómo se gestionan los roles de usuario?|Gestionar roles de usuario/i', $message)) {
                $botman->reply('Los roles de usuario se gestionan desde la sección de roles, donde se pueden agregar, modificar y eliminar los roles asignados a cada usuario, especificando las funcionalidades, permisos y accesos correspondientes de acuerdo con su perfil y responsabilidades laborales.');
            } elseif (preg_match('/¿Qué es un informe de actividades?|Informe de actividades/i', $message)) {
                $botman->reply('Un informe de actividades es un documento que presenta y detalla las tareas, acciones, resultados y logros alcanzados por un empleado o equipo de trabajo en un periodo determinado, proporcionando una visión clara y organizada del desempeño laboral.');
            } elseif (preg_match('/¿Cómo se realiza una revisión de zonas de trabajo?|Revisión de zonas de trabajo/i', $message)) {
                $botman->reply('Para realizar una revisión de zonas de trabajo, se selecciona la zona correspondiente, se verifica la ubicación geográfica o área departamental asignada, y se actualiza la información según los cambios requeridos para una distribución eficiente de las responsabilidades laborales.');
            } elseif (preg_match('/¿Qué es un Admin?|Admin/i', $message)) {
                $botman->reply('Un Admin es un rol con permisos administrativos para gestionar y supervisar las funcionalidades, usuarios, roles y configuraciones de la plataforma, garantizando el correcto funcionamiento y seguridad de los datos.');
            } elseif (preg_match('/¿Qué es una Jefatura inmediata?|Jefatura inmediata/i', $message)) {
                $botman->reply('Una Jefatura inmediata es un rol de supervisión directa que coordina, guía y evalúa las actividades y desempeño de un equipo de trabajo, proporcionando retroalimentación, apoyo y recursos necesarios para alcanzar los objetivos y metas establecidos.');
            } elseif (preg_match('/¿Qué es una Jefatura zonal de proceso?|Jefatura zonal de proceso/i', $message)) {
                $botman->reply('Una Jefatura zonal de proceso es un rol de supervisión y coordinación que se encarga de gestionar, planificar y optimizar los procesos operativos y actividades de un área geográfica específica, asegurando la eficiencia y calidad en la ejecución de las tareas asignadas.');
            } elseif (preg_match('/¿Qué es una Jefatura zonal de proceso de trabajo?|Jefatura zonal de proceso de trabajo/i', $message)) {
                $botman->reply('Una Jefatura zonal de proceso de trabajo es un rol especializado en la supervisión y gestión de las actividades, tareas y proyectos específicos de un área geográfica, asegurando la correcta implementación, seguimiento y cumplimiento de los procedimientos y estándares establecidos.');
            } elseif (preg_match('/¿Qué es un Superintendente de zona?|Superintendente de zona/i', $message)) {
                $botman->reply('Un Superintendente de zona es un rol de alta dirección y supervisión que se encarga de liderar, coordinar y evaluar las operaciones, equipos de trabajo y proyectos de una zona geográfica específica, garantizando el cumplimiento de los objetivos, metas y políticas corporativas.');
            } elseif (preg_match('/¿Qué es un Subgerente de trabajo?|Subgerente de trabajo/i', $message)) {
                $botman->reply('Un Subgerente de trabajo es un rol de gestión y liderazgo que se encarga de apoyar, coordinar y supervisar las actividades, proyectos y equipos de trabajo de un departamento o área específica, colaborando en la toma de decisiones estratégicas y el desarrollo de soluciones innovadoras.');
            } elseif (preg_match('/¿Qué es un Gerente divisional?|Gerente divisional/i', $message)) {
                $botman->reply('Un Gerente divisional es un rol de alta dirección y liderazgo que se encarga de dirigir, planificar y evaluar las operaciones, estrategias y equipos de trabajo de una división o área corporativa, garantizando el crecimiento, desarrollo y éxito del negocio en el mercado.');
            } elseif (preg_match('/¿Qué es un contrato EVENTUAL SINDICALIZADO?|EVENTUAL SINDICALIZADO/i', $message)) {
                $botman->reply('Un contrato EVENTUAL SINDICALIZADO es un acuerdo laboral temporal con un empleado que forma parte de un sindicato, donde se establecen las condiciones, responsabilidades y derechos durante un periodo específico, cumpliendo con las normas y regulaciones sindicales.');
            } elseif (preg_match('/¿Qué es un contrato BASE SINDICALIZADO?|BASE SINDICALIZADO/i', $message)) {
                $botman->reply('Un contrato BASE SINDICALIZADO es un acuerdo laboral indefinido con un empleado que forma parte de un sindicato, donde se establecen las condiciones, responsabilidades y derechos de manera permanente, garantizando el respeto y cumplimiento de los derechos laborales y las normas sindicales.');
            } elseif (preg_match('/¿Qué es un contrato EVENTUAL CONFIANZA?|EVENTUAL CONFIANZA/i', $message)) {
                $botman->reply('Un contrato EVENTUAL CONFIANZA es un acuerdo laboral temporal con un empleado de confianza, donde se establecen las condiciones, responsabilidades y derechos durante un periodo específico, garantizando la flexibilidad y adaptabilidad en las funciones y proyectos asignados.');
            } elseif (preg_match('/¿Qué es un contrato BASE CONFIANZA?|BASE CONFIANZA/i', $message)) {
                $botman->reply('Un contrato BASE CONFIANZA es un acuerdo laboral indefinido con un empleado de confianza, donde se establecen las condiciones, responsabilidades y derechos de manera permanente, garantizando la estabilidad, compromiso y confidencialidad en las funciones y proyectos asignados.');
            } elseif (preg_match('/Admin?|Responsabilidades de un Admin/i', $message)) {
                $botman->reply('Un Admin es responsable de gestionar y supervisar las funcionalidades, usuarios, roles y configuraciones de la plataforma, garantizando el correcto funcionamiento, seguridad de los datos y cumplimiento de las políticas y procedimientos establecidos.');
            } 
            
            
            
            
            elseif (preg_match('/Jefatura inmediata?|Funciones de una Jefatura inmediata/i', $message)) {
                $botman->reply('Una Jefatura inmediata realiza funciones de supervisión, coordinación, evaluación y retroalimentación de las actividades y desempeño de un equipo de trabajo, proporcionando apoyo, recursos y dirección necesaria para alcanzar los objetivos y metas establecidos.');
            } elseif (preg_match('/Jefatura zonal de proceso?|Rol de una Jefatura zonal de proceso/i', $message)) {
                $botman->reply('Una Jefatura zonal de proceso tiene el rol de gestionar, planificar, optimizar y supervisar los procesos operativos y actividades de un área geográfica específica, asegurando la eficiencia, calidad y cumplimiento de los procedimientos y estándares establecidos.');
            } elseif (preg_match('/Superintendente de zona?|Responsabilidades de un Superintendente de zona/i', $message)) {
                $botman->reply('Un Superintendente de zona es responsable de liderar, coordinar, evaluar y tomar decisiones estratégicas sobre las operaciones, equipos de trabajo y proyectos de una zona geográfica específica, garantizando el cumplimiento de los objetivos, metas y políticas corporativas.');
            } elseif (preg_match('/Subgerente de trabajo?|Funciones de un Subgerente de trabajo/i', $message)) {
                $botman->reply('Un Subgerente de trabajo realiza funciones de apoyo, coordinación, supervisión y liderazgo en un departamento o área específica, colaborando en la toma de decisiones estratégicas, desarrollo de soluciones innovadoras y optimización de los recursos y procesos de trabajo.');
            } elseif (preg_match('/Gerente divisional?|Responsabilidades de un Gerente divisional/i', $message)) {
                $botman->reply('Un Gerente divisional es responsable de dirigir, planificar, evaluar y tomar decisiones estratégicas sobre las operaciones, estrategias y equipos de trabajo de una división o área corporativa, garantizando el crecimiento, desarrollo y éxito del negocio en el mercado.');
            } elseif (preg_match('/EVENTUAL SINDICALIZADO?|Implicaciones de un EVENTUAL SINDICALIZADO/i', $message)) {
                $botman->reply('Un contrato EVENTUAL SINDICALIZADO implica un acuerdo laboral temporal con un empleado que forma parte de un sindicato, donde se establecen las condiciones, responsabilidades y derechos durante un periodo específico, cumpliendo con las normas y regulaciones sindicales.');
            } elseif (preg_match('/BASE SINDICALIZADO?|Condiciones de un BASE SINDICALIZADO/i', $message)) {
                $botman->reply('Un contrato BASE SINDICALIZADO establece un acuerdo laboral indefinido con un empleado que forma parte de un sindicato, donde se especifican las condiciones, responsabilidades y derechos de manera permanente, garantizando el respeto y cumplimiento de los derechos laborales y las normas sindicales.');
            } elseif (preg_match('/contrato EVENTUAL CONFIANZA?|Implicaciones de un EVENTUAL CONFIANZA/i', $message)) {
                $botman->reply('Un contrato EVENTUAL CONFIANZA implica un acuerdo laboral temporal con un empleado de confianza, donde se establecen las condiciones, responsabilidades y derechos durante un periodo específico, garantizando la flexibilidad y adaptabilidad en las funciones y proyectos asignados.');
            } elseif (preg_match('/BASE CONFIANZA?|Condiciones de un BASE CONFIANZA/i', $message)) {
                $botman->reply('Un contrato BASE CONFIANZA establece un acuerdo laboral indefinido con un empleado de confianza, donde se especifican las condiciones, responsabilidades y derechos de manera permanente, garantizando la estabilidad, compromiso y confidencialidad en las funciones y proyectos asignados.');
            }  elseif (preg_match('/subir un documento/i', $message)) {
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
            }
            
            
            
            
            
            elseif (preg_match('/como reporto un problema/i', $message)) {
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
            }
            
            
            
            
            
            elseif (preg_match('/derecho.*vacaiones\s+/iu', $message)) {
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
            } elseif (preg_match('/maternidad|paternidad/i', $message)) {
                $botman->reply('Los derechos de maternidad/paternidad están protegidos por la ley y la empresa puede ofrecer beneficios adicionales.');
            }
            
            
            
            
            
            elseif (preg_match('/compensación por accidentes de trabajo/i', $message)) {
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
            } 
            
            
            
            
            
            elseif (preg_match('/protección a la maternidad/i', $message)) {
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
            } 
            
            
            
            
            
            
            
            elseif (preg_match('/para que es un puesto/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/para que sirven los puestos/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/porque me pide el puesto/i', $message)) {
                $botman->reply('Para conocer el puesto del empleado y sus actividades relacionadas');
            } elseif (preg_match('/que tipos de contratos hay/i', $message)) {
                $botman->reply('4 tipos: Eventual sindicalizado, base sindicalizado, eventual confianza y base confianza');
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
            }elseif (preg_match('/RPE inexistente/iu', $message)) {
                $botman->reply('Si busca un empleado y no lo encuentra por RPE le sugerimos que revise si la búsqueda se hizo correctamente, y en caso de serlo así, reportar la falta del mismo a su superior');
            } elseif (preg_match('/para que es.*ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/que sirve.*ver perfil/iu', $message)) {
                $botman->reply('Sirve para ver los datos de los empleados, además de acceder al menu en el que se pueden crear documentos acerca del mismo empleado');
            } elseif (preg_match('/no encuentro una opcion/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            } elseif (preg_match('/no encuentro un boton/iu', $message)) {
                $botman->reply('Si usten no encuentra una opción, preguntame cual es la opción que buscas. Si mi respuesta no te ayuda lo mas seguro es que no tengas los permisos necesarios para acceder a esa opcion');
            }
            
            
            
            
            
            elseif (preg_match('/RPE repetido/iu', $message)) {
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
                $botman->reply('Para registrar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde registrar.*usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar.*usuario/iu', $message)) {
                $botman->reply('Para registrar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/donde añadir.*usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir.*usuario/iu', $message)) {
                $botman->reply('Para añadir usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir.*usuario/iu', $message)) {
                $botman->reply('Para añadir un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            }elseif (preg_match('/como crear.*usuario/iu', $message)) {
                $botman->reply('Para crear usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear.*usuario/iu', $message)) {
                $botman->reply('Para crear un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde agregar.*usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar.*usuario/iu', $message)) {
                $botman->reply('Para agregar usuarios hay que entrar al menu de usuarios en la opción de registrar usuario y completar el formulario correspondiente');
            } elseif (preg_match('/puedo agregar.*usuario/iu', $message)) {
                $botman->reply('Para agregar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } 
            
            
            
            
            
            elseif (preg_match('/donde registrar.*empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como registrar.*empleado/iu', $message)) {
                $botman->reply('Para registrar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo registrar.*empleado/iu', $message)) {
                $botman->reply('Para registrar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde añadir.*empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como añadir.*empleado/iu', $message)) {
                $botman->reply('Para añadir empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo añadir.*empleado/iu', $message)) {
                $botman->reply('Para añadir un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como crear.*empleado/iu', $message)) {
                $botman->reply('Para crear empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo crear.*empleado/iu', $message)) {
                $botman->reply('Para crear un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde agregar.*empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/como agregar.*empleado/iu', $message)) {
                $botman->reply('Para agregar empleados hay que entrar al menu de empleados en la opción de agregar empleado y completar el formulario correspondiente');
            } elseif (preg_match('/puedo agregar.*empleado/iu', $message)) {
                $botman->reply('Para agregar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/como modificar.*usuario/iu', $message)) {
                $botman->reply('Para modificar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras modificar los datos del usuario');
            } elseif (preg_match('/donde modificar.*usuario/iu', $message)) {
                $botman->reply('Para modificar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras modificar los datos del usuario');
            } elseif (preg_match('/puedo modificar.*usuario/iu', $message)) {
                $botman->reply('Para modificar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/como modificar.*empleado/iu', $message)) {
                $botman->reply('Para modificar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para modificar los datos del empleado');
            } elseif (preg_match('/donde modificar.*empleado/iu', $message)) {
                $botman->reply('Para modificar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para modificar los datos del empleado');
           } elseif (preg_match('/puedo modificar.*empleado/iu', $message)) {
                $botman->reply('Para modificar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/como editar.*usuario/iu', $message)) {
                $botman->reply('Para editar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras editar los datos del usuario');
            } elseif (preg_match('/donde editar.*usuario/iu', $message)) {
                $botman->reply('Para editar un usuario necesitas colocar el cursor sobre el nombre de usuario sobre el menu de opciones, posteriormente apareceran 2 opciones debajo. Abre la opcion de ver perfil y se abrirá una vista en la que podras editar los datos del usuario');
            } elseif (preg_match('/puedo editar.*usuario/iu', $message)) {
                $botman->reply('Para editar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/como editar.*empleado/iu', $message)) {
                $botman->reply('Para editar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para editar los datos del empleado');
            } elseif (preg_match('/donde editar.*empleado/iu', $message)) {
                $botman->reply('Para editar los datos de un empleado solo tienes que ir a tu listado, apretar el botón de "ver perfil" del respectivo empleados y cuando se abra la vista correspondiente ir a la ultima opcion para editar los datos del empleado');
            } elseif (preg_match('/puedo editar.*empleados/iu', $message)) {
                $botman->reply('Para editar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde eliminar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            }
            
            
            
            
            
            elseif (preg_match('/como eliminar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/puedo eliminar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde quitar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/como quitar.*usuario/iu', $message)) {
                $botman->reply('Para eliminar un usuario solo tienes que ir al listado de usuarios, buscar el usuario en cuestión y dar click en el respectivo boton de eliminar del usuario');
            } elseif (preg_match('/puedo quitar.*usuario/iu', $message)) {
                $botman->reply('Para quitar un usuario es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde eliminar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/como eliminar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/puedo eliminar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde quitar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
            } elseif (preg_match('/como quitar.*empleado/iu', $message)) {
                $botman->reply('Para eliminar un empleado solo tienes que ir a mi listado, buscar el empleado en cuestión y dar click en el respectivo boton de eliminar del empleado');
           } elseif (preg_match('/puedo quitar.*empleado/iu', $message)) {
                $botman->reply('Para quitar un empleado es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*indicador/iu', $message)) {
                $botman->reply('Para crear el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como crear.*indicador/iu', $message)) {
                $botman->reply('Para crear el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo crear.*indicador/iu', $message)) {
                $botman->reply('Para crear un indicador es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            }  elseif (preg_match('/puedo añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir un indicador es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar un indicador es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo hay que ir al apartado de crear indicador en el menu de indicadores, llenar el formulario y dar click en guardar');
            }elseif (preg_match('/donde registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            }
            
            
            
            
            
            elseif (preg_match('/donde añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/como crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo hay que ir al apartado de añadir puestos en el menu de Puestos, llenar el formulario y dar click en guardar');
            } elseif (preg_match('/puedo crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            }  elseif (preg_match('/que es.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/que son.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/sirven.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones con las que debe cumplir el respectivo empleado con el puesto asignado');
            } elseif (preg_match('/sirve.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones con las que debe cumplir el respectivo empleado con el puesto asignado');
            } elseif (preg_match('/donde agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            }elseif (preg_match('/donde crear.*zona/iu', $message)) {
                $botman->reply('Para crear una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como crear.*zona/iu', $message)) {
                $botman->reply('Para crear una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo crear.*zona/iu', $message)) {
                $botman->reply('Para crear una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde añadir.*zona/iu', $message)) {
                $botman->reply('Para añadir una zona solo hay que ir al apartado de kistado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como añadir.*zona/iu', $message)) {
                $botman->reply('Para añadir una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo añadir.*zona/iu', $message)) {
                $botman->reply('Para añadir una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde registrar.*zona/iu', $message)) {
                $botman->reply('Para registrar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/como registrar.*zona/iu', $message)) {
                $botman->reply('Para registrar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, llenar los datos de la nueva zona en la parte superior y dar click en el boton agregar zona');
            } elseif (preg_match('/puedo registrar.*zona/iu', $message)) {
                $botman->reply('Para registrar una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } 
            
            
            
            
            elseif (preg_match('/donde modificar.*zona/iu', $message)) {
                $botman->reply('Para modificar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/como modificar.*zona/iu', $message)) {
                $botman->reply('Para modificar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/puedo modificar.*zona/iu', $message)) {
                $botman->reply('Para modificar una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde editar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/como editar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona solo hay que ir al apartado de listado de zonas en el menu de Zonas, buscar la respectiva zona en el listado y presionar al respectivo boton de modificar. Posteriormente llenar el formulario con los nuevos datos y guardar');
            } elseif (preg_match('/puedo editar.*zona/iu', $message)) {
                $botman->reply('Para editar una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
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
                $botman->reply('Para quitar una zona es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde registrar.*contrato/iu', $message)) {
                $botman->reply('Para registrar un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/como registrar.*contrato/iu', $message)) {
                $botman->reply('Para registrar un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/puedo registrar.*contrato/iu', $message)) {
                $botman->reply('Para registrar un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde añadir.*contrato/iu', $message)) {
                $botman->reply('Para añadir un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/como añadir.*contrato/iu', $message)) {
                $botman->reply('Para añadir un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/puedo añadir.*contrato/iu', $message)) {
                $botman->reply('Para añadir un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde agregar.*contrato/iu', $message)) {
                $botman->reply('Para agregar un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/como agregar.*contrato/iu', $message)) {
                $botman->reply('Para agregar un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/puedo agregar.*contrato/iu', $message)) {
                $botman->reply('Para agregar un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*contrato/iu', $message)) {
                $botman->reply('Para crear un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/como crear.*contrato/iu', $message)) {
                $botman->reply('Para crear un contrato solo hay que ir al apartado de contratos en el menu de Otros, escribir el nombre del nuevo contrato en la parte superior y dar click en Agregar contrato');
            } elseif (preg_match('/puedo crear.*contrato/iu', $message)) {
                $botman->reply('Para crear un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde modificar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser modificados una vez creados');
            }
            
            
            
            
            
            elseif (preg_match('/como modificar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser modificados una vez creados');
            } elseif (preg_match('/puedo modificar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser modificados una vez creados');
            } elseif (preg_match('/donde editar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser editados una vez creados');
            } elseif (preg_match('/como editar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser editados una vez creados');
            } elseif (preg_match('/puedo editar.*contrato/iu', $message)) {
                $botman->reply('Los contratos no pueden ser editados una vez creados');
            } elseif (preg_match('/donde eliminar.*contrato/iu', $message)) {
                $botman->reply('Para eliminar un contrato solo hay que ir al apartado de contratos en el menu de Otros y dar click en el boton de eliminar en el respectivo contrato');
            } elseif (preg_match('/como eliminar.*contrato/iu', $message)) {
                $botman->reply('Para eliminar un contrato solo hay que ir al apartado de contratos en el menu de Otros y dar click en el boton de eliminar en el respectivo contrato');
            } elseif (preg_match('/puedo eliminar.*contrato/iu', $message)) {
                $botman->reply('Para eliminar un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde quitar.*contrato/iu', $message)) {
                $botman->reply('Para quitar un contrato solo hay que ir al apartado de contratos en el menu de Otros y dar click en el boton de eliminar en el respectivo contrato');
            } elseif (preg_match('/como quitar.*contrato/iu', $message)) {
                $botman->reply('Para quitar un contrato solo hay que ir al apartado de contratos en el menu de Otros y dar click en el boton de eliminar en el respectivo contrato');
            } elseif (preg_match('/puedo quitar.*contrato/iu', $message)) {
                $botman->reply('Para quitar un contrato es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde registrar.*rol/iu', $message)) {
                $botman->reply('Para registrar un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/como registrar.*rol/iu', $message)) {
                $botman->reply('Para registrar un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/puedo registrar.*rol/iu', $message)) {
                $botman->reply('Para registrar un rol es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde añadir.*rol/iu', $message)) {
                $botman->reply('Para añadir un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/como añadir.*rol/iu', $message)) {
                $botman->reply('Para añadir un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/puedo añadir.*rol/iu', $message)) {
                $botman->reply('Para añadir un rol es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            }elseif (preg_match('/donde agregar.*rol/iu', $message)) {
                $botman->reply('Para agregar un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/como agregar.*rol/iu', $message)) {
                $botman->reply('Para agregar un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/puedo agregar.*rol/iu', $message)) {
                $botman->reply('Para agregar un rol es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde crear.*rol/iu', $message)) {
                $botman->reply('Para crear un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/como crear.*rol/iu', $message)) {
                $botman->reply('Para crear un rol solo hay que ir al apartado de rol en el menu de Otros, escribir el nombre y dar click en agregar rol');
            } elseif (preg_match('/puedo crear.*rol/iu', $message)) {
                $botman->reply('Para crear un rol es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde modificar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser modificador una vez creados');
            } elseif (preg_match('/como modificar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser modificador una vez creados');
            }
            
            
            
            
            
            elseif (preg_match('/puedo modificar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser modificador una vez creados');
            } elseif (preg_match('/donde editar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser editados una vez creados');
            } elseif (preg_match('/como editar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser editados una vez creados');
            } elseif (preg_match('/puedo editar.*rol/iu', $message)) {
                $botman->reply('Los roles no pueden ser editados una vez creados');
            } elseif (preg_match('/donde eliminar.*rol/iu', $message)) {
                $botman->reply('Para eliminar un rol solo hay que ir al apartado de roles en el menu de Otros y dar click en el boton de eliminar en el respectivo rol');
            } elseif (preg_match('/como eliminar.*rol/iu', $message)) {
                $botman->reply('Para eliminar un rol solo hay que ir al apartado de roles en el menu de Otros y dar click en el boton de eliminar en el respectivo rol');
            } elseif (preg_match('/puedo eliminar.*rol/iu', $message)) {
                $botman->reply('Para eliminar un rol es necesario tener los permisos necesarios, si no aparece la respectiva vista consulta con tu superior el acceso a esta funcion');
            } elseif (preg_match('/donde quitar.*rol/iu', $message)) {
                $botman->reply('Para quitar un rol solo hay que ir al apartado de roles en el menu de Otros y dar click en el boton de eliminar en el respectivo rol');
            } elseif (preg_match('/como quitar.*rol/iu', $message)) {
                $botman->reply('Para quitar un rol solo hay que ir al apartado de roles en el menu de Otros y dar click en el boton de eliminar en el respectivo rol');
            } 

            


         
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        
            elseif (preg_match('/worker rights|labor rights|labor protection/i', $message)) {
                $botman->reply('Worker rights include minimum wage, statutory benefits, access to social security, and the right to a safe and healthy work environment. Would you like to know more about a specific right?');
            } elseif (preg_match('/minimum wage|base salary|salary payment/i', $message)) {
                $botman->reply('The minimum wage is the minimum amount an employer must pay their employees for their work. The minimum wage is set by law and can vary depending on the geographical area and type of work.');
            } elseif (preg_match('/statutory benefits|legal benefits|labor rights/i', $message)) {
                $botman->reply('Statutory benefits include Christmas bonus, paid vacation, vacation premium, and access to social security. It is important to know and exercise your labor rights to ensure a fair and equitable work environment.');
            } elseif (preg_match('/social security|IMSS affiliation|right to health/i', $message)) {
                $botman->reply('You have the right to social security, including affiliation to the IMSS, which provides you with medical care, economic benefits, and other health-related benefits.');
            } elseif (preg_match('/overtime|extra work|hour compensation/i', $message)) {
                $botman->reply('Overtime must be compensated according to what is established in the Federal Labor Law. Make sure to correctly record the overtime worked to receive the corresponding compensation.');
            } elseif (preg_match('/paid vacation|right to vacation|vacation period/i', $message)) {
                $botman->reply('You have the right to paid vacation according to what is established in the Federal Labor Law. Make sure to schedule your vacations in advance and meet the requirements to access this benefit.');
            } elseif (preg_match('/vacation premium|vacation payment|vacation compensation/i', $message)) {
                $botman->reply('In addition to the salary during vacations, you have the right to receive a vacation premium equivalent to 25% of your daily salary. Make sure to receive this payment along with your salary before going on vacation.');
            } elseif (preg_match('/Christmas bonus|bonus payment|right to bonus/i', $message)) {
                $botman->reply('You have the right to receive a Christmas bonus every year, which must be equivalent to at least 15 days of salary. Make sure to receive your bonus before December 20th of each year.');
            } elseif (preg_match('/indemnity|settlement|right to indemnity/i', $message)) {
                $botman->reply('In case of termination of the employment relationship, you have the right to receive an indemnity or settlement according to what is established in the Federal Labor Law and in your employment contract.');
            } elseif (preg_match('/maternity leave|maternity license|maternity rights/i', $message)) {
                $botman->reply('Female workers have the right to a 12-week maternity leave with full pay. During this period, the worker has the right to the necessary medical care and to keep her job.');
            } elseif (preg_match('/paternity leave|paternity license|paternity rights/i', $message)) {
                $botman->reply('Male workers have the right to a 5-day paternity leave with full pay. During this period, the worker has the right to the necessary medical care and to keep his job.');
            } elseif (preg_match('/union rights|union freedom|union affiliation/i', $message)) {
                $botman->reply('Workers have the right to be part of a union, to participate in union activities, and to collective bargaining for the improvement of working conditions. It is important to know and exercise your union rights.');
            } elseif (preg_match('/gender equality|non-discrimination|human rights/i', $message)) {
                $botman->reply('All workers have the right to equal opportunities and treatment in the workplace, without discrimination based on gender, age, disability, social condition, religion, or any other personal or social condition.');
            } elseif (preg_match('/safety and hygiene|safe working conditions|labor protection/i', $message)) {
                $botman->reply('Workers have the right to a safe and healthy work environment, with the necessary conditions to prevent work-related accidents and illnesses. It is important to follow safety and hygiene protocols.');
            } elseif (preg_match('/right to training|professional development|labor development/i', $message)) {
                $botman->reply('Workers have the right to receive ongoing training and professional development to improve their skills and labor competencies, according to the needs of the job and company policies.');
            } elseif (preg_match('/right to privacy|protection of personal data|confidentiality/i', $message)) {
                $botman->reply('Workers have the right to privacy and protection of their personal data in the workplace. The company must respect the confidentiality of workers\' personal and professional information.');
            } elseif (preg_match('/freedom of expression|free opinion|open communication/i', $message)) {
                $botman->reply('Workers have the right to freedom of expression and free opinion in the workplace, as long as the rights and opinions of others are respected and a respectful and collaborative work environment is maintained.');
            } elseif (preg_match('/code of ethics|conduct rules|labor ethics/i', $message)) {
                $botman->reply('The code of ethics of the Federal Electricity Commission (CFE) establishes the principles and values that guide the behavior and decisions of the company\'s employees. Would you like to know more about a specific aspect of the CFE\'s code of ethics?');
            } elseif (preg_match('/integrity|honesty|transparency/i', $message)) {
                $botman->reply('Integrity, honesty, and transparency are fundamental values in the CFE\'s code of ethics. Employees must act with ethics and responsibility in all their work activities and professional relationships.');
            } elseif (preg_match('/respect|tolerance|diversity/i', $message)) {
                $botman->reply('Respect, tolerance, and appreciation for diversity are important principles in the CFE\'s code of ethics. Employees must treat their colleagues, clients, and stakeholders with respect and courtesy, regardless of their differences.');
            } elseif (preg_match('/commitment|responsibility|compliance/i', $message)) {
                $botman->reply('Commitment, responsibility, and compliance are essential values in the CFE\'s code of ethics. Employees must fulfill their work obligations, respect the company\'s policies and procedures, and act with professionalism and dedication.');
            } elseif (preg_match('/business ethics|ethical management|responsible business practices/i', $message)) {
                $botman->reply('Business ethics, ethical management, and responsible business practices are key aspects in the CFE\'s code of ethics. The company is committed to acting ethically and responsibly in all its operations and strategic decisions.');
            } elseif (preg_match('/transparency|accountability|information ethics/i', $message)) {
                $botman->reply('Transparency, accountability, and information ethics are fundamental principles in the CFE\'s code of ethics. The company is committed to providing truthful, timely, and reliable information to its stakeholders and to acting with transparency in all its operations.');
            } elseif (preg_match('/conflict of interest|professional ethics|conflict management/i', $message)) {
                $botman->reply('Prevention and management of conflicts of interest, professional ethics, and conflict management are important aspects in the CFE\'s code of ethics. Employees must avoid situations that may generate a conflict of interest and act with ethics and professionalism in all their decisions and actions.');
            } elseif (preg_match('/sustainability|environmental responsibility|sustainable development/i', $message)) {
                $botman->reply('Sustainability, environmental responsibility, and sustainable development are priority values in the CFE\'s code of ethics. The company is committed to promoting sustainable business practices, protecting the environment, and contributing to the economic, social, and environmental development of the communities where it operates.');
            } 
            
            
            
            
            
            elseif (preg_match('/compliance|regulatory compliance|risk management/i', $message)) {
                $botman->reply('Compliance with laws, regulatory compliance, and risk management are key aspects in the CFE\'s code of ethics. The company is committed to complying with applicable laws, regulations, and standards, proactively managing risks associated with its operations, and promoting a culture of compliance and business ethics.');
            } elseif (preg_match('/workplace safety and health|risk prevention|employee well-being/i', $message)) {
                $botman->reply('Workplace safety and health, risk prevention, and employee well-being are priority aspects in the CFE\'s code of ethics. The company is committed to providing a safe and healthy work environment, implementing risk prevention measures, and promoting the physical and emotional well-being of its employees.');
            } elseif (preg_match('/ethics in hiring|fair selection processes|equal opportunities/i', $message)) {
                $botman->reply('Ethics in hiring, fair selection processes, and equal opportunities are essential principles in the CFE\'s code of ethics. The company is committed to promoting ethical, transparent, and merit-based hiring practices, respecting equal opportunities and diversity.');
            } elseif (preg_match('/labor standards|internal regulations|work policies/i', $message)) {
                $botman->reply('CFE workers, and any worker in general, must comply with labor standards, internal regulations, and work policies established by the company. Would you like to know more about a specific standard or work policy?');
            } elseif (preg_match('/punctuality|attendance|work schedules/i', $message)) {
                $botman->reply('Punctuality, attendance, and compliance with work schedules are fundamental rules that workers must follow. It is important to arrive on time, comply with the established work hours, and correctly record attendance.');
            } elseif (preg_match('/dress code|personal image|dress code policy/i', $message)) {
                $botman->reply('Workers must follow the dress code or personal image regulations established by the company. It is important to dress appropriately and professionally, respecting dress and personal presentation rules.');
            } elseif (preg_match('/conduct|behavior|professional ethics/i', $message)) {
                $botman->reply('Workers must maintain professional conduct, ethical and respectful behavior, and comply with the conduct and behavior rules established by the company. It is important to act with integrity, honesty, and responsibility in all work activities and professional relationships.');
            } elseif (preg_match('/workplace safety|personal protection|safety rules/i', $message)) {
                $botman->reply('Workers must comply with workplace safety rules, use the appropriate personal protective equipment, and follow the safety protocols established by the company. It is important to maintain a safe work environment and prevent work-related accidents and risks.');
            } elseif (preg_match('/work quality|quality standards|work processes/i', $message)) {
                $botman->reply('Workers must maintain high quality standards in their work, follow quality standards and work procedures established by the company. It is important to comply with technical specifications, quality standards, and customer or user requirements.');
            } elseif (preg_match('/use of resources|energy saving|recycling/i', $message)) {
                $botman->reply('Workers must use resources efficiently and responsibly, promote energy saving, sustainable use of natural resources, and participate in the company\'s recycling and environmental management initiatives.');
            } elseif (preg_match('/confidentiality|data protection|sensitive information/i', $message)) {
                $botman->reply('Workers must maintain confidentiality, protect personal data and sensitive company information, and comply with data protection and information security regulations established by the company and applicable legislation.');
            } elseif (preg_match('/internal communication|collaboration|teamwork/i', $message)) {
                $botman->reply('Workers must promote internal communication, collaborate with their colleagues, and work as a team to achieve the company\'s objectives and goals. It is important to share information, ideas, and resources effectively and constructively.');
            } elseif (preg_match('/training and development|training|continuous learning/i', $message)) {
                $botman->reply('Workers must participate in training and professional development, receive training, and promote continuous learning to improve their skills and labor competencies, and contribute to the company\'s growth and success.');
            } elseif (preg_match('/compliance with laws|legal regulations|regulations/i', $message)) {
                $botman->reply('Workers must comply with laws, legal regulations, regulations, and standards applicable to their work, and follow the compliance policies and procedures established by the company. It is important to act with responsibility, integrity, and professional ethics in all work activities and business relationships.');
            } elseif (preg_match('/safety mechanisms|workplace safety|labor protection/i', $message)) {
                $botman->reply('Safety mechanisms at work include safety protocols, personal protective equipment, safety training, safety inspections, and occupational risk prevention programs.');
            } elseif (preg_match('/employee rights|labor rights|rights protection/i', $message)) {
                $botman->reply('Employee rights include the right to a safe and healthy work environment, the right to equal opportunities and fair treatment, the right to privacy and protection of personal data, and the right to freedom of association and collective bargaining.');
            } elseif (preg_match('/personal protective equipment|PPE|use of PPE/i', $message)) {
                $botman->reply('Personal Protective Equipment (PPE) are devices, garments, or equipment designed to protect workers against work-related risks. It is mandatory to use suitable PPE according to the type of work and associated risks.');
            } elseif (preg_match('/safety training|risk prevention training|labor safety courses/i', $message)) {
                $botman->reply('Safety training at work is essential to provide workers with the knowledge and skills necessary to identify, prevent, and respond appropriately to work-related risks. Workers must receive regular safety and health training.');
            } elseif (preg_match('/emergency protocols|emergency plan|emergency evacuation/i', $message)) {
                $botman->reply('Emergency protocols and the emergency plan are established procedures to respond in an organized and effective manner to emergency situations, such as fires, accidents, or natural disasters. Workers must know and follow emergency protocols and participate in evacuation drills.');
            } elseif (preg_match('/safety inspections|safety audits|risk assessments/i', $message)) {
                $botman->reply('Safety inspections, safety audits, and risk assessments are tools used to identify, evaluate, and control work-related risks. It is important to carry out periodic inspections, safety audits, and risk assessments to ensure a safe and healthy work environment.');
            } elseif (preg_match('/work-related risk prevention|risk prevention programs|risk management/i', $message)) {
                $botman->reply('Work-related risk prevention includes the identification, evaluation, and control of work-related risks to prevent accidents and occupational diseases. Risk prevention programs and risk management are essential to promote a safe and healthy work environment.');
            } elseif (preg_match('/risk reporting|incident reporting|risk communication/i', $message)) {
                $botman->reply('Workers have the right and responsibility to report work-related risks, report incidents, and communicate risks to the company so that necessary preventive measures can be taken. It is important to promote a culture of reporting and risk communication in the company.');
            } elseif (preg_match('/right to information|access to information|transparent communication/i', $message)) {
                $botman->reply('Workers have the right to receive clear, accurate, and timely information about working conditions, work-related risks, safety and health measures, and rights and responsibilities regarding occupational risk prevention. It is important to promote transparent and accessible communication.');
            } elseif (preg_match('/personal data protection|employee privacy|confidentiality/i', $message)) {
                $botman->reply('Workers have the right to the protection of their personal data, privacy in the workplace, and confidentiality of personal and professional information. The company must comply with data protection laws and guarantee the security and privacy of information.');
            }

            
        
        
            elseif (preg_match('/right to health|medical care|medical expenses insurance/i', $message)) {
                $botman->reply('Workers have the right to health, adequate medical care, and access to health services. The company must provide medical expenses insurance, occupational medical services, and wellness programs to promote the health and well-being of employees.');
            }elseif (preg_match('/equal opportunities|non-discrimination|diversity and inclusion/i', $message)) {
                $botman->reply('Workers have the right to equal opportunities, fair treatment, and non-discrimination on grounds of gender, age, race, religion, disability, or any other personal or social condition. The company must promote diversity and inclusion and combat any form of discrimination.');
            } elseif (preg_match('/right to union freedom|union affiliation|collective bargaining/i', $message)) {
                $botman->reply('Workers have the right to union freedom, union affiliation, and collective bargaining for the protection of their labor interests and improvement of working conditions. The company must respect and guarantee the exercise of these rights and promote constructive dialogue with unions.');
            } elseif (preg_match('/compliance with regulations|regulations|labor laws/i', $message)) {
                $botman->reply('Workers and the company must comply with applicable regulations, regulations, and labor laws, including provisions on occupational safety and health, labor rights, working conditions, and labor relations. It is important to know and comply with legal obligations and promote a culture of compliance.');
            } elseif (preg_match('/Federal Labor Law|LFT|labor legislation/i', $message)) {
                $botman->reply('The Federal Labor Law is the legislation that regulates labor relations in Mexico, establishing the rights and obligations of workers and employers. It is essential to know and comply with the Federal Labor Law to ensure a fair and equitable work environment.');
            } elseif (preg_match('/employment contract|types of contracts|labor conditions/i', $message)) {
                $botman->reply('The Federal Labor Law establishes the basis for the formalization of the employment contract, types of employment contracts, working conditions, and the rights and obligations of workers and employers. It is important to have a written employment contract and know the labor conditions established in the Law.');
            } elseif (preg_match('/working hours|work schedules|rest periods/i', $message)) {
                $botman->reply('The Federal Labor Law regulates the working hours, work schedules, rest periods, overtime, and mandatory rest days. Workers have the right to a fair working day, adequate rest periods, and compensation for overtime.');
            } elseif (preg_match('/minimum wage|salaries|labor payments/i', $message)) {
                $botman->reply('The Federal Labor Law establishes the minimum wage, forms of payment, labor benefits, and salary concepts. Workers have the right to receive a fair wage, legal benefits, and timely and complete labor payments.');
            } elseif (preg_match('/Christmas bonus|vacations|legal benefits/i', $message)) {
                $botman->reply('The Federal Labor Law establishes the right of workers to Christmas bonuses, paid vacations, vacation premium, and other legal benefits. Workers have the right to enjoy these benefits in accordance with what is established in the Law.');
            } elseif (preg_match('/union rights|union freedom|collective bargaining/i', $message)) {
                $botman->reply('The Federal Labor Law recognizes and protects union rights, including union freedom, the right to union affiliation, and collective bargaining. Workers have the right to form, affiliate with unions, and participate in union activities to defend their labor interests.');
            } elseif (preg_match('/dismissal|termination of contract|severance pay/i', $message)) {
                $botman->reply('The Federal Labor Law establishes the causes, procedures, and rights in case of dismissal or termination of employment contract, including compensation, severance pay, and workers\' rights. It is important to know and respect the rights and procedures established in the Law in case of dismissal or termination.');
            } elseif (preg_match('/occupational safety and health|risk prevention|working conditions/i', $message)) {
                $botman->reply('The Federal Labor Law regulates occupational safety and health, risk prevention, and working conditions. Employers have the obligation to provide a safe and healthy work environment, implement risk prevention measures, and comply with safety and hygiene standards established in the Law.');
            } elseif (preg_match('/maternity rights|maternity leave|maternity protection/i', $message)) {
                $botman->reply('The Federal Labor Law protects maternity rights, including maternity leave, prenatal and postnatal rest, and protection against dismissal due to pregnancy or maternity. Female workers have the right to enjoy these benefits and protections during pregnancy and after childbirth.');
            } elseif (preg_match('/paternity rights|paternity leave|paternity protection/i', $message)) {
                $botman->reply('The Federal Labor Law recognizes paternity rights, including paternity leave and protection against dismissal due to paternity. Workers have the right to enjoy these benefits and protections during the birth or adoption of a child.');
            } elseif (preg_match('/workplace harassment|sexual harassment|workplace violence/i', $message)) {
                $botman->reply('The Federal Labor Law prohibits workplace harassment, sexual harassment, and workplace violence, establishing prevention, attention, and sanction measures. Workers have the right to a workplace free from harassment and violence, and companies must promote a culture of respect and tolerance.');
            } elseif (preg_match('/workplace discrimination|gender equality|workplace inclusion/i', $message)) {
                $botman->reply('The Federal Labor Law prohibits workplace discrimination, promotes gender equality, diversity, and inclusion in the workplace. Workers have the right to equal and fair treatment, and companies must combat any form of discrimination and promote equal opportunities.');
            } elseif (preg_match('/rights of migrant workers|migrant worker protection|decent work/i', $message)) {
                $botman->reply('The Federal Labor Law protects the rights of migrant workers, including protection against labor exploitation, human trafficking, and discrimination. Migrant workers have the right to decent work, fair working conditions, and protection against any form of abuse or exploitation.');
            } elseif (preg_match('/compliance with tax obligations|employer obligations|labor contributions/i', $message)) {
                $botman->reply('The Federal Labor Law establishes tax, employer obligations, and labor contributions that employers must comply with, including the payment of taxes, worker-employer contributions, contributions to INFONAVIT, SAR, among others. Employers have the responsibility to comply with these obligations and guarantee the rights of workers.');
            } elseif (preg_match('/worker obligations|worker duties|labor responsibilities/i', $message)) {
                $botman->reply('Worker obligations include complying with the company\'s norms and policies, performing their tasks and responsibilities diligently and efficiently, respecting work schedules, and complying with the obligations established in the employment contract and the Federal Labor Law.');
            } elseif (preg_match('/compliance with schedules|punctual attendance|working hours/i', $message)) {
                $botman->reply('The worker has the obligation to comply with work schedules, arrive punctually at their workplace, and comply with the working hours established in the employment contract or labor regulations.');
            } elseif (preg_match('/task execution|work performance|productivity/i', $message)) {
                $botman->reply('The worker must perform their tasks and labor responsibilities diligently, efficiently, and professionally, contributing to the achievement of the company\'s objectives and goals and maintaining good work performance.');
            } elseif (preg_match('/compliance with norms|company policies|internal regulations/i', $message)) {
                $botman->reply('The worker has the obligation to comply with the norms, policies, and procedures established by the company, including the internal work regulations, occupational safety and hygiene policies, and internal regulations.');
            } elseif (preg_match('/respect for colleagues|teamwork|work environment/i', $message)) {
                $botman->reply('The worker must respect their colleagues, collaborate in teamwork, and contribute to maintaining a harmonious, respectful, and collaborative work environment.');
            } elseif (preg_match('/appropriate use of resources|care of tools|conservation of materials/i', $message)) {
                $botman->reply('The worker has the obligation to use the resources, tools, and work materials provided by the company appropriately, take care of their conservation, and avoid any waste or misuse.');
            } elseif (preg_match('/confidentiality|data protection|sensitive information/i', $message)) {
                $botman->reply('The worker must maintain confidentiality and protect sensitive information, personal data, and trade secrets of the company, avoiding their disclosure or misuse.');
            }
            
            
            
            
            
            elseif (preg_match('/participation in training|continuous training|professional updating/i', $message)) {
                $botman->reply('The worker has the obligation to participate in training, training courses, and professional updating programs provided by the company to improve their skills and labor competencies.');
            } elseif (preg_match('/compliance with tax obligations|tax declaration|labor contributions/i', $message)) {
                $botman->reply('The worker must comply with their tax obligations, including tax declaration, payment of labor contributions, and other tax obligations established by applicable legislation.');
            } elseif (preg_match('/communication with the company|reporting absences|notification of changes/i', $message)) {
                $botman->reply('The worker has the obligation to maintain fluid and timely communication with the company, notify any changes in their personal data, report absences or labor incidents, and comply with the procedures established by the company.');
            } elseif (preg_match('/appropriate use of uniforms|personal image|dress code/i', $message)) {
                $botman->reply('The worker must use the uniform, clothing, or personal protective equipment provided by the company appropriately, maintain a professional personal image, and comply with the dress code or personal image regulations established.');
            } elseif (preg_match('/work ethic|integrity|honesty/i', $message)) {
                $botman->reply('The worker must act with work ethic, integrity, and honesty in all their work activities, complying with professional conduct principles, respecting the company\'s values, and acting with transparency and responsibility.');
            } elseif (preg_match('/prevention of occupational risks|safety and hygiene|personal protection/i', $message)) {
                $botman->reply('The worker has the obligation to comply with occupational safety and hygiene standards, use personal protective equipment appropriately, participate in the prevention of occupational risks, and follow the safety instructions and procedures established by the company.');
            } elseif (preg_match('/achievement of objectives|work goals|performance/i', $message)) {
                $botman->reply('The worker must strive to achieve the objectives, work goals, and performance standards established by the company, contributing to the success and growth of the organization.');
            } elseif (preg_match('/respect for authority|work obedience|organizational hierarchy/i', $message)) {
                $botman->reply('The worker must respect authority, comply with the orders and guidelines of their superiors, and respect the organizational hierarchy, maintaining a cordial, professional, and respectful work relationship with their bosses and colleagues.');
            } elseif (preg_match('/maintenance of tools|care of equipment|conservation of facilities/i', $message)) {
                $botman->reply('The worker has the responsibility to care for and maintain in good condition the tools, equipment, machinery, and work facilities provided by the company, report any defect or failure, and collaborate in their conservation and maintenance.');
            } elseif (preg_match('/contribution to continuous improvement|innovation|creativity/i', $message)) {
                $botman->reply('The worker must contribute to continuous improvement, promote innovation and creativity in the work environment, propose ideas and solutions to optimize work processes, and contribute to the development and success of the company.');
            } elseif (preg_match('/CFE Procedures|CFE Protocols|CFE Regulations/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) has various procedures and protocols to guarantee safety, efficiency, and quality in the provision of electric services. It is important to know and follow the procedures and protocols established by the CFE to ensure reliable and safe electric service.');
            } elseif (preg_match('/Electrical installations|maintenance of networks|electrical infrastructure/i', $message)) {
                $botman->reply('The CFE has procedures for the design, construction, operation, and maintenance of electrical installations, distribution networks, and electrical infrastructure, guaranteeing safety, efficiency, and quality in the provision of electric services.');
            } elseif (preg_match('/Customer service|complaints|consultations/i', $message)) {
                $botman->reply('The CFE has procedures for customer service, management of complaints, consultations, and service requests, ensuring timely, efficient, and satisfactory attention to users.');
            } elseif (preg_match('/Risk prevention|safety and hygiene|civil protection/i', $message)) {
                $botman->reply('The CFE has protocols for occupational safety and hygiene, prevention of electrical risks, civil protection, and emergency response, guaranteeing the protection of workers, users, and communities against possible risks and contingencies.');
            } elseif (preg_match('/Billing and payments|electric rates|consumption calculation/i', $message)) {
                $botman->reply('The CFE has procedures for billing and payments for electric services, establishment of electric rates, consumption calculation, and collection management, ensuring accurate, transparent, and fair billing.');
            } elseif (preg_match('/Energy management|energy efficiency|energy saving/i', $message)) {
                $botman->reply('The CFE has protocols for energy management, promotion of energy efficiency, encouragement of energy saving, and development of renewable energy projects, contributing to sustainability and environmental care.');
            } elseif (preg_match('/Electrical connections|service connection|contract modifications/i', $message)) {
                $botman->reply('The CFE has procedures for electrical connections, service connection request, contract modification, tariff change, and additional services, guaranteeing efficient and timely management of user requests.');
            } elseif (preg_match('/Technical regulations|quality standards|electrical regulations/i', $message)) {
                $botman->reply('The CFE follows technical regulations, quality standards, electrical regulations, and international best practices in the provision of electric services, ensuring conformity, reliability, and quality in its operations and services.');
            } elseif (preg_match('/Technological innovation|emerging technologies|modernization/i', $message)) {
                $botman->reply('The CFE promotes technological innovation, adopts emerging technologies, and modernizes its electrical infrastructures and systems, seeking to improve operational efficiency, service quality, and user satisfaction.');
            } elseif (preg_match('/Energy education and culture|training|environmental awareness/i', $message)) {
                $botman->reply('The CFE carries out energy education and culture programs, offers training to workers, and promotes environmental awareness, encouraging responsible use of energy, sustainable practices, and citizen participation in energy issues.');
            } elseif (preg_match('/Communication with the CFE|notifications|requests/i', $message)) {
                $botman->reply('Users can communicate with the CFE, make notifications, service requests, and consultations through various channels such as the CFE website, customer service centers, and digital platforms, ensuring timely and efficient attention to users.');
            }elseif (preg_match('/Safety training|Prevention training|Security training/i', $message)) {
                $botman->reply('Safety training is essential to provide workers with the knowledge, skills, and competencies needed to identify, prevent, and manage occupational risks, promoting a safety culture and encouraging safe practices at work.');
            } elseif (preg_match('/Safety signage|Safety indicators|Marking hazardous areas/i', $message)) {
                $botman->reply('Safety signage is fundamental to inform, warn, and guide workers about risks, prohibitions, obligations, and safety measures in the workplace, using signs, colors, pictograms, and visual messages to improve guidance and safety.');
            } elseif (preg_match('/Workplace emergencies|Emergency plans|Evacuation procedures/i', $message)) {
                $botman->reply('Emergency plans and evacuation procedures are crucial to prepare and respond effectively to emergency situations, such as fires, accidents, natural disasters, ensuring the safety and protection of workers, users, and facilities.');
            } elseif (preg_match('/Electrical tools|Risk prevention|Electrical standards/i', $message)) {
                $botman->reply('Prevention of electrical risks is essential to ensure the safety of workers performing activities with electrical tools, equipment, and installations, complying with electrical standards, protection measures, and using appropriate equipment and tools.');
            } 

         
        
            elseif (preg_match('/Handling hazardous substances|Chemical storage|Chemical safety protocols/i', $message)) {
                $botman->reply('Handling hazardous substances requires compliance with chemical safety protocols, prevention measures, proper storage, use of protective equipment, and specific training to ensure the safety and protection of workers and the environment.');
            } elseif (preg_match('/Work ergonomics|Workstation adaptation|Prevention of musculoskeletal injuries/i', $message)) {
                $botman->reply('Work ergonomics focuses on the design, adaptation, and organization of the workstation to minimize the risks of musculoskeletal injuries, improve comfort, well-being, and efficiency of workers, and prevent work-related musculoskeletal disorders.');
            } elseif (preg_match('/Safety inspections|Safety audits|Periodic reviews/i', $message)) {
                $botman->reply('Safety inspections and safety audits are management tools to verify compliance with standards, identify deficiencies, improvement opportunities, assess safety performance, and promote continuous improvement in the occupational safety management system.');
            } elseif (preg_match('/Working at heights|Fall prevention|Fall protection equipment/i', $message)) {
                $botman->reply('Working at heights presents significant fall risks, so it is essential to implement fall prevention measures, use fall protection equipment, such as harnesses, lifelines, guardrails, and follow specific safety protocols for working at heights.');
            } elseif (preg_match('/Machinery and work equipment|Machine inspection|Safe use training/i', $message)) {
                $botman->reply('Safe use of machinery and work equipment requires implementing safety measures, periodic inspections, proper maintenance, training in safe use and handling of machinery, and using personal protective equipment to prevent accidents and injuries.');
            } elseif (preg_match('/Work in confined spaces|Entry and exit protocols|Self-contained breathing apparatus/i', $message)) {
                $botman->reply('Working in confined spaces presents risks of asphyxiation, poisoning, entrapment, so it is essential to implement safe entry and exit protocols, use self-contained breathing apparatus, monitor the atmosphere, train staff, and follow specific safety measures.');
            } elseif (preg_match('/Hearing protection|Noise exposure|Hearing protection equipment/i', $message)) {
                $botman->reply('Hearing protection is essential to prevent exposure to high noise levels that can cause hearing damage and health problems, so it is necessary to identify noise sources, assess exposure levels, use hearing protection equipment, and provide training in hearing risk prevention.');
            } elseif (preg_match('/Waste management|Safe waste handling|Recycling and disposal protocols/i', $message)) {
                $botman->reply('Labor waste management requires compliance with safe waste handling protocols, proper classification, adequate storage, recycling, final disposal, and monitoring of hazardous waste, ensuring environmental protection, worker health, and compliance with environmental regulations.');
            } elseif (preg_match('/Safety communication|Awareness campaigns|Worker participation/i', $message)) {
                $botman->reply('Safety communication is essential to promote a safety culture, raise awareness among workers about occupational risks, encourage active participation, involvement, and commitment of workers in risk prevention, and promote continuous improvement in safety.');
            } elseif (preg_match('/Mental health at work|Stress prevention|Psychological support and well-being/i', $message)) {
                $botman->reply('Mental health at work is essential for the comprehensive well-being of workers, so it is necessary to promote healthy work environments, prevent work-related stress, offer psychological support, well-being programs, and promote mental health promotion activities at work.');
            } elseif (preg_match('/Technologies|Technological innovation|Equipment/i', $message)) {
                $botman->reply('Various technologies and advanced equipment are used to ensure efficiency, safety, and quality in the generation, transmission, and distribution of electrical energy.');
            } elseif (preg_match('/Power generation|Power plants|Generation technologies/i', $message)) {
                $botman->reply('Power plants equipped with advanced power generation technologies such as gas turbines, steam turbines, hydroelectric plants, wind farms, and photovoltaic solar plants are operated.');
            } elseif (preg_match('/Power transmission|Electric grid|Transmission technologies/i', $message)) {
                $botman->reply('An extensive electric transmission grid is operated equipped with advanced technologies, control systems, protection, automation, and high-voltage equipment.');
            } elseif (preg_match('/Power distribution|Distribution network|Distribution technologies/i', $message)) {
                $botman->reply('An electric distribution network managed with modern technologies, control systems, measurement, automation, and distribution equipment is operated.');
            } elseif (preg_match('/Electrical infrastructures|Electric substations|Infrastructure equipment/i', $message)) {
                $botman->reply('Critical electrical infrastructures, such as electric substations, transformation plants, and distribution networks, are maintained and operated.');
            } elseif (preg_match('/Measurement and control|Measurement systems|Control technologies/i', $message)) {
                $botman->reply('Advanced measurement and control systems equipped with modern technologies, smart devices, smart meters, and telemetry systems are used.');
            } elseif (preg_match('/Process automation|Automated systems|Automation technologies/i', $message)) {
                $botman->reply('Process automation systems equipped with advanced technologies, specialized software, SCADA systems, PLCs, smart sensors, and actuators are implemented.');
            } elseif (preg_match('/Data management|Information systems|Information technologies/i', $message)) {
                $botman->reply('Advanced information systems, technological platforms, databases, information management systems, ERP systems, GIS systems, and big data and analytics technologies are used.');
            } elseif (preg_match('/Cybersecurity|Information security|Security technologies/i', $message)) {
                $botman->reply('Information security and cybersecurity measures and technologies, such as firewalls, intrusion detection and prevention systems, encryption systems, authentication, SIEM systems, and security policies, are implemented.');
            } elseif (preg_match('/Technological innovation|Research and development|Emerging technologies/i', $message)) {
                $botman->reply('Technological innovation is promoted, investment in research and development is made, and emerging technologies, such as renewable energies, energy storage, smart grids, IoT, AI, blockchain, and digital technologies, are adopted.');
            } elseif (preg_match('/Training and education|Training technologies|Training programs/i', $message)) {
                $botman->reply('Training and education are offered through technical training programs, update courses, specialized workshops, certifications, and e-learning platforms.');
            } elseif (preg_match('/Collaboration and partnerships|Collaboration technologies|Partnerships and alliances/i', $message)) {
                $botman->reply('Strategic collaborations and partnerships are established with technology companies, suppliers, startups, academic institutions, research centers, and international organizations.');
            } elseif (preg_match('/Sustainability and environment|Green technologies|Environmental management/i', $message)) {
                $botman->reply('Sustainability and environmental management are promoted, green technologies, renewable energies, energy efficiency, environmental management systems, and sustainable practices are implemented.');
            } elseif (preg_match('/Regulations|Regulations|Legislation/i', $message)) {
                $botman->reply('Regulations and regulations are established to regulate and guarantee safety, quality, efficiency, reliability, sustainability, and protection of user rights in the generation, transmission, distribution, and commercialization of electrical energy.');
            } elseif (preg_match('/Electric Industry Law|EIL|EIL regulations/i', $message)) {
                $botman->reply('The Electric Industry Law (EIL) establishes the legal and regulatory framework for the organization, operation, and development of the electric industry, promoting competition, efficiency, transparency, sustainability, and universal access to electrical services.');
            }
            
            
            
            
            elseif (preg_match('/Official Mexican Standards|NOMs|NOMs regulations/i', $message)) {
                $botman->reply('The Official Mexican Standards (NOMs) establish technical specifications, criteria, procedures, and mandatory minimum requirements to guarantee quality, safety, efficiency, environmental protection, and compliance with standards in the generation, transmission, distribution, and commercialization of electrical energy.');
            } elseif (preg_match('/Electric tariffs|Tariffs|Tariff regulations/i', $message)) {
                $botman->reply('Electric tariffs are established and regulated through criteria, methodologies, and procedures defined by the Energy Regulatory Commission (CRE), considering costs, investments, efficiency, quality, sustainability, and protection of user rights.');
            } elseif (preg_match('/Open access|Network access|Open access regulations/i', $message)) {
                $botman->reply('Open and non-discriminatory access to the electric transmission and distribution network is promoted, regulated by the CRE, guaranteeing competition, equity, transparency, efficiency, and third-party access to the electrical infrastructure for the generation, transmission, and distribution of electrical energy.');
            } elseif (preg_match('/Electric interconnection|Interconnection|Interconnection regulations/i', $message)) {
                $botman->reply('Regulations and procedures for electric interconnection are established, promoting integration, operation, interconnection, and cooperation between electrical systems, countries, regions, and participants in the electric market, guaranteeing the security, reliability, efficiency, and sustainability of the interconnected electrical system.');
            } elseif (preg_match('/Distributed generation|Distributed generation|Distributed generation regulations/i', $message)) {
                $botman->reply('Distributed generation is promoted, regulated by the CRE, allowing users to generate, consume, and sell electrical energy on a small scale, using renewable sources, efficient cogeneration systems, and distributed generation technologies, contributing to the diversification, sustainability, and resilience of the electrical system.');
            } elseif (preg_match('/Energy efficiency|Efficiency|Energy efficiency regulations/i', $message)) {
                $botman->reply('Energy efficiency and energy conservation are promoted, establishing regulations, incentives, programs, and promotion measures to reduce electrical energy consumption, improve efficiency in generation, transmission, distribution, and final use of electrical energy, and mitigate environmental impact.');
            } elseif (preg_match('/Environmental protection|Environment|Environmental protection regulations/i', $message)) {
                $botman->reply('Regulations and environmental protection measures are established to minimize environmental impact, prevent pollution, manage waste, reduce greenhouse gas emissions, promote the use of renewable energies, and comply with international commitments and environmental sustainability objectives.');
            } elseif (preg_match('/User rights|Consumer protection|User rights regulations/i', $message)) {
                $botman->reply('Regulations and user rights are established to protect their rights, guarantee quality, continuity, safety, reliability, transparency, information, accessibility, fair tariffs, and efficient provision of electrical services, promoting participation, consultation, and user education.');
            } elseif (preg_match('/Electrical safety|Safety|Electrical safety regulations/i', $message)) {
                $botman->reply('Regulations and electrical safety measures are established to ensure protection, safety, physical integrity, reliability, safe operation, and prevention of electrical accidents and risks in the generation, transmission, distribution, and use of electrical energy, and promote an electrical safety culture.');
            } elseif (preg_match('/Transparency|Transparency|Transparency regulations/i', $message)) {
                $botman->reply('Transparency, accountability, and access to public information are promoted in the electricity sector, establishing regulations, supervision mechanisms, monitoring, and disclosure of information about the operation, management, investments, tariffs, contracts, and performance of the electricity sector.');
            } elseif (preg_match('/Citizen participation|Participation|Citizen participation regulations/i', $message)) {
                $botman->reply('Citizen participation, public consultation, and collaboration with civil society, communities, and stakeholders in decision-making, planning, development, operation, and regulation of the electricity sector are promoted, fostering inclusion, dialogue, and cooperation in building a sustainable and resilient electrical system.');
            } elseif (preg_match('/International cooperation|Cooperation|International cooperation regulations/i', $message)) {
                $botman->reply('Mechanisms for international cooperation, bilateral collaboration, agreements, conventions, and international treaties are established to promote integration, interconnection, exchange, harmonization, and cooperation in the development, operation, regulation, and management of the electricity sector, contributing to the strengthening of the electrical system and regional integration.');
            } elseif (preg_match('/Energy transition|Transition|Energy transition regulations/i', $message)) {
                $botman->reply('Energy transition is promoted, establishing regulations, incentives, programs, measures, and strategies to transition to a low-carbon economy, promote the use of renewable energies, reduce greenhouse gas emissions, improve energy efficiency, and achieve sustainable development goals.');
            }elseif (preg_match('/Education and awareness|Education|Awareness/i', $message)) {
                $botman->reply('Actions, campaigns, programs, and activities are carried out for education, awareness, awareness, and dissemination about the efficient, safe, responsible, and sustainable use of electric energy, promoting energy culture, citizen participation, and social responsibility.');
            } elseif (preg_match('/Accessibility and inclusion|Accessibility|Inclusion/i', $message)) {
                $botman->reply('Accessibility, inclusion, special attention, and adaptation of customer service for people with disabilities, the elderly, and vulnerable groups are promoted, guaranteeing equitable access, use, and enjoyment of electrical services, and respecting human rights and the dignity of individuals.');
            } elseif (preg_match('/Satisfaction and quality|Satisfaction|Quality/i', $message)) {
                $botman->reply('Customer satisfaction, perception, and service quality are monitored, evaluated, and continuously improved, collecting feedback, opinions, and suggestions from users, and implementing actions, improvements, and solutions to exceed expectations, solve problems, and optimize the user experience.');
            } elseif (preg_match('/Policies and procedures|Policies|Procedures/i', $message)) {
                $botman->reply('Policies, procedures, standards, and customer service protocols are established and applied, aimed at ensuring efficient, consistent, uniform, and high-quality customer service, and complying with regulations, regulations, and service standards in the electrical sector.');
            } elseif (preg_match('/Professional development|Professional growth|Training/i', $message)) {
                $botman->reply('Professional development, professional growth, and continuous training of employees are promoted, offering opportunities, programs, and resources to strengthen competencies, skills, knowledge, and capacities in technologies, processes, and operation of the electrical infrastructure.');
            } elseif (preg_match('/Training and education|Training programs|Training courses/i', $message)) {
                $botman->reply('Training and education programs, courses, workshops, seminars, certifications, and e-learning platforms are offered, using modern training technologies, pedagogical methodologies, digital resources, and interactive tools, to strengthen the competencies, skills, knowledge, and capacities of staff in technologies, processes, and operation of the electrical infrastructure.');
            } elseif (preg_match('/Professional growth and development|Career plan|Growth opportunities/i', $message)) {
                $botman->reply('Career plans, professional development programs, performance evaluations, mentorships, coaching, and internal growth opportunities are implemented to promote mobility, promotions, and professional development of employees, and to recognize and reward talent, commitment, and contribution to organizational success.');
            } elseif (preg_match('/Certifications and skills|Certifications|Technical skills/i', $message)) {
                $botman->reply('The obtaining of certifications, technical skills, and specialized competencies in key areas, such as electrical engineering, project management, network operation, equipment maintenance, occupational safety, energy efficiency, digital technologies, and quality management, is promoted to ensure excellence, professionalism, and high quality in work performance.');
            } elseif (preg_match('/Innovation and technology|Innovation|Emerging technologies/i', $message)) {
                $botman->reply('Innovation, adoption of emerging technologies, and continuous improvement are encouraged through participation in innovative projects, collaborations, strategic alliances, research and development, innovation laboratories, and open innovation programs to drive digital transformation, competitiveness, and leadership in the electrical sector.');
            } elseif (preg_match('/Leadership development|Leadership|Leadership skills/i', $message)) {
                $botman->reply('Leadership skills, managerial competencies, team management, decision making, effective communication, and interpersonal skills are developed through leadership programs, management development workshops, executive coaching, and leadership strengthening activities to train committed, inspiring, and transformative leaders in the organization.');
            } elseif (preg_match('/Organizational culture and values|Organizational culture|Corporate values/i', $message)) {
                $botman->reply('A solid organizational culture, corporate values, professional ethics, social responsibility, and commitment to excellence are promoted through awareness programs, communication, training, and cultural strengthening activities to cultivate a positive, inclusive, collaborative, and results-oriented work environment in the organization.');
            } elseif (preg_match('/Recognition and benefits|Recognition|Employee benefits/i', $message)) {
                $botman->reply('Recognition programs, incentives, awards, and employee benefits, such as bonuses, compensation, insurance, and development opportunities, are established to value, motivate, retain, and reward performance, commitment, and contribution of employees to achieving organizational objectives and results.');
            }
            
        

        
        
            elseif (preg_match('/Diversity and inclusion|Diversity|Inclusion/i', $message)) {
                $botman->reply('Diversity, inclusion, gender equity, respect for cultural diversity, and equal opportunities are promoted through policies, programs, and actions of awareness, training, and strengthening of diversity and inclusion to create an inclusive, diverse, and respectful work environment of human rights and diversity.');
            } elseif (preg_match('/Health and wellness|Health|Well-being/i', $message)) {
                $botman->reply('Health, wellness, occupational safety, risk prevention, and quality of work life programs are implemented, offering services, resources, and activities to promote physical, mental, emotional health, and comprehensive well-being of employees, and create a healthy, safe, and balanced work environment in the organization.');
            } elseif (preg_match('/Corporate social responsibility|CSR|Sustainability/i', $message)) {
                $botman->reply('Actions, projects, and corporate social responsibility, sustainability, and social commitment programs are developed in areas such as education, environment, community development, and social welfare to contribute to sustainable development, care for the environment, improvement of quality of life, and generation of positive impact in communities and society.');
            } elseif (preg_match('/Internal communication and feedback|Internal communication|Feedback/i', $message)) {
                $botman->reply('Internal communication, feedback, and open dialogue are strengthened through communication channels, digital platforms, surveys, and participation spaces to promote transparency, participation, collaboration, and commitment of employees, and facilitate the exchange of information, ideas, and feedback in the organization.');
            } elseif (preg_match('/Change management and adaptability|Change management|Adaptability/i', $message)) {
                $botman->reply('Change management, adaptability, flexibility, resilience, and responsiveness to changes, challenges, and transformations of the environment are promoted through change management programs, training, support, and accompaniment to strengthen the capacity for adaptation, innovation, and transformation of the organization.');
            } elseif (preg_match('/Emerging technologies|Technological innovation|Advanced technology/i', $message)) {
                $botman->reply('Emerging technologies, technological innovation, and advanced solutions in electronics, informatics, automation, digitization, artificial intelligence, Internet of Things (IoT), renewable energies, energy storage, smart grids, electric vehicles, and data management are adopted and applied to improve efficiency, reliability, sustainability, and competitiveness of the electrical sector.');
            } elseif (preg_match('/Strategic planning and management|Strategic planning|Management/i', $message)) {
                $botman->reply('Strategic planning, management, organizational development, strategic alignment, goal setting, performance measurement, and continuous improvement are carried out to guide, lead, and manage the organization towards the achievement of objectives, goals, and results aligned with the mission, vision, values, and strategic priorities of the company.');
            } elseif (preg_match('/Project management and execution|Project management|Execution/i', $message)) {
                $botman->reply('Project management, planning, execution, monitoring, control, evaluation, and closure of projects are carried out with methodologies, tools, and techniques of project management to ensure compliance, effectiveness, efficiency, quality, and success in the execution of projects and initiatives of the organization.');
            } elseif (preg_match('/Infrastructure and equipment maintenance|Infrastructure maintenance|Equipment maintenance/i', $message)) {
                $botman->reply('Maintenance, inspection, monitoring, and preventive and corrective repair of electrical infrastructure, equipment, networks, installations, and systems are carried out to guarantee availability, reliability, functionality, safety, and optimization of infrastructure and electrical services to users.');
            } elseif (preg_match('/Occupational health and safety|Occupational health|Safety/i', $message)) {
                $botman->reply('Occupational health, safety, risk prevention, compliance with regulations, standards, and protocols in occupational health and safety, and the promotion of a culture of prevention, care, and safety are prioritized to protect the physical integrity, health, and well-being of employees and collaborators in the organization.');
            } elseif (preg_match('/Environmental protection and sustainability|Environmental protection|Sustainability/i', $message)) {
                $botman->reply('Environmental protection, sustainability, care for the environment, energy efficiency, reduction of environmental impact, use of renewable energies, waste management, and eco-friendly practices are promoted through programs, projects, and actions to contribute to the conservation of natural resources and the mitigation of climate change.');
            } elseif (preg_match('/Customer service and satisfaction|Customer service|Satisfaction/i', $message)) {
                $botman->reply('Customer service, attention, satisfaction, and customer orientation are prioritized, promoting a culture of service, excellence, attention, and personalized care to meet needs, expectations, requirements, and solve problems and concerns of users and customers in a timely, efficient, and effective manner.');
            } elseif (preg_match('/Innovation and technological development|Innovation|Technological development/i', $message)) {
                $botman->reply('Innovation, technological development, research, development, adoption, and implementation of new technologies, solutions, products, services, processes, and practices are encouraged and supported to drive competitiveness, leadership, differentiation, and transformation in the electrical sector.');
            } elseif (preg_match('/Employee well-being and quality of life|Employee well-being|Quality of life/i', $message)) {
                $botman->reply('Employee well-being, quality of life, work-life balance, health, safety, personal development, and comprehensive well-being are promoted through programs, activities, resources, and services to create a healthy, positive, motivating, and harmonious work environment that contributes to the personal and professional development of employees.');
            } elseif (preg_match('/Stakeholder engagement and communication|Stakeholder engagement|Communication/i', $message)) {
                $botman->reply('Stakeholder engagement, communication, relationship management, dialogue, participation, and collaboration with stakeholders, users, customers, suppliers, communities, authorities, and interested parties are promoted to build trust, strengthen relationships, enhance reputation, and generate value in the organization.');
            } elseif (preg_match('/Quality management and continuous improvement|Quality management|Continuous improvement/i', $message)) {
                $botman->reply('Quality management, continuous improvement, excellence, efficiency, effectiveness, quality assurance, and customer satisfaction are promoted through quality management systems, methodologies, tools, and practices to ensure high quality, compliance, and continuous improvement in products, services, and processes of the organization.');
            } elseif (preg_match('/Energy efficiency and conservation|Energy efficiency|Conservation/i', $message)) {
                $botman->reply('Energy efficiency, energy conservation, responsible and sustainable use of energy, optimization of energy consumption, reduction of energy waste, and promotion of energy saving habits, practices, and technologies are encouraged through awareness, education, training, and energy management programs.');
            } elseif (preg_match('/Regulatory compliance and legal requirements|Regulatory compliance|Legal requirements/i', $message)) {
                $botman->reply('Regulatory compliance, legal requirements, regulations, laws, standards, and norms in the electrical sector are met and complied with, promoting a culture of compliance, integrity, ethics, responsibility, transparency, and legal certainty in the organization.');
            } elseif (preg_match('/Project development and management|Project development|Management/i', $message)) {
                $botman->reply('Project development, planning, management, execution, monitoring, control, evaluation, and closure of projects and initiatives are carried out with methodologies, tools, and techniques of project management to ensure compliance, effectiveness, efficiency, quality, and success in the execution of projects.');
            } elseif (preg_match('/Renewable energy and clean technologies|Renewable energy|Clean technologies/i', $message)) {
                $botman->reply('Renewable energy, clean technologies, sustainable practices, green energy, reduction of carbon footprint, and promotion of renewable energies, such as solar, wind, hydroelectric, biomass, and geothermal, are encouraged and supported to contribute to the transition to a low-carbon economy and mitigate climate change.');
            } elseif (preg_match('/Digital transformation and technology adoption|Digital transformation|Technology adoption/i', $message)) {
                $botman->reply('Digital transformation, technology adoption, innovation, digitalization, automation, artificial intelligence, Internet of Things (IoT), digital platforms, and technological solutions are promoted and implemented to improve processes, services, operations, efficiency, competitiveness, and leadership in the electrical sector.');
            } elseif (preg_match('/Customer relationship management|Customer relationship|CRM/i', $message)) {
                $botman->reply('Customer relationship management, customer service, attention, care, loyalty, satisfaction, and retention are prioritized and strengthened through strategies, programs, actions, and tools of customer relationship management to build lasting and profitable relationships with users and customers.');
            } elseif (preg_match('/Risk management and prevention|Risk management|Risk prevention/i', $message)) {
                $botman->reply('Risk management, risk identification, assessment, analysis, mitigation, prevention, monitoring, and control are promoted and implemented to anticipate, prevent, mitigate, and manage risks, threats, vulnerabilities, and contingencies that may affect the organization, users, customers, and stakeholders.');
            } elseif (preg_match('/Data management and analytics|Data management|Data analytics/i', $message)) {
                $botman->reply('Data management, data governance, data quality, data analytics, big data, business intelligence, data visualization, data-driven decision making, and data-driven strategies are promoted and implemented to manage, analyze, interpret, and use data to improve processes, services, operations, and decision making in the organization.');
            } elseif (preg_match('/Customer orientation and service culture|Customer orientation|Service culture/i', $message)) {
                $botman->reply('Customer orientation, service culture, customer satisfaction, attention, care, loyalty, and relationship are promoted through training, communication, awareness, and programs to prioritize and enhance the service, experience, and relationship with users and customers in the organization.');
            }
            
            
            
            
            
            elseif (preg_match('/Project Integration|Coordination|Unification|Synergy/i', $message)) {
                $botman->reply('Integration, coordination, unification, and synergy are promoted among projects, teams, departments, and areas through integration management practices, tools, and techniques, such as program management, portfolios, and PMO (Project Management Office). This is to align, harmonize, optimize, and leverage resources, efforts, capabilities, and knowledge, and to encourage collaboration, cooperation, and teamwork in project organization and execution.');
            } elseif (preg_match('/Project Closure|Completion|Delivery|Evaluation/i', $message)) {
                $botman->reply('An orderly, systematic, and evaluative closure of projects is carried out through the completion, delivery, acceptance, review, evaluation, and feedback of projects, using project closure techniques, tools, and practices, such as lessons learned, audits, and post-mortem, to ensure compliance, satisfaction, learning, improvement, and success in the completion and delivery of projects, and to facilitate the transfer of knowledge, results, and learning in projects.');
            } elseif (preg_match('/Agile Management|Scrum|Kanban|Agility/i', $message)) {
                $botman->reply('Agile practices, principles, and frameworks, such as Scrum, Kanban, Lean, and Agile, are adopted to foster agile, flexible, adaptive, and collaborative project management. This promotes iteration, inspection, adaptation, continuous improvement, and value delivery in projects, and facilitates a quick, efficient, and effective response to changes, challenges, and opportunities in the environment, market, and project requirements.');
            } elseif (preg_match('/Program Management|Portfolios|PMO|Strategy/i', $message)) {
                $botman->reply('Program and portfolio management are promoted through the implementation and operation of a PMO (Project Management Office) to align, coordinate, supervise, and optimize the strategy, planning, execution, control, and value of programs and projects. This ensures an integrated, strategic, and aligned management with organizational objectives, goals, priorities, and benefits.');
            } elseif (preg_match('/Change Management|Adaptability|Flexibility|Resilience/i', $message)) {
                $botman->reply('Effective, adaptive, flexible, and resilient change management is promoted through the identification, evaluation, planning, implementation, and monitoring of changes, using change management techniques, tools, and practices, such as impact analysis, communication, training, and resistance management, to facilitate adaptation, acceptance, and leveraging of changes, innovations, and transformations in projects and the organization.');
            } elseif (preg_match('/Operation and Maintenance of Equipment|Teams|Machinery|Facilities/i', $message)) {
                $botman->reply('Efficient, effective, and safe operation and maintenance of equipment, machinery, facilities, and electrical systems are carried out using operation and maintenance techniques, tools, procedures, and practices to ensure availability, reliability, performance, durability, and operational efficiency of the equipment, and to guarantee safety, integrity, compliance, and sustainability in the operation and maintenance of assets and electrical infrastructure.');
            } elseif (preg_match('/Equipment Inspection|Review|Supervision|Diagnosis/i', $message)) {
                $botman->reply('Rigorous, systematic, and preventive inspection, review, supervision, and diagnosis of equipment, machinery, facilities, and electrical systems are conducted using inspection techniques, tools, and procedures, such as checklists, tests, analysis, and monitoring, to detect, identify, evaluate, prevent, and correct anomalies, defects, failures, wear, deterioration, and risks in equipment, ensuring its correct operation and performance.');
            } elseif (preg_match('/Preventive Maintenance|Planning|Scheduling|Execution/i', $message)) {
                $botman->reply('Planned, scheduled, and executed preventive maintenance of equipment, machinery, facilities, and electrical systems is implemented using preventive maintenance techniques, tools, and practices, such as calendars, routines, programs, and maintenance checklists, to optimize availability, reliability, service life, performance, and efficiency of the equipment, and to prevent, reduce, and mitigate failures, breakdowns, wear, deterioration, and risks in the equipment.');
            } elseif (preg_match('/Corrective Maintenance|Repair|Problem Solving|Intervention/i', $message)) {
                $botman->reply('Reactive, proactive, and systematic corrective maintenance of equipment, machinery, facilities, and electrical systems is carried out using corrective maintenance techniques, tools, and procedures, such as diagnosis, repair, adjustment, calibration, and replacement of components, to correct, restore, and solve failures, breakdowns, defects, wear, deterioration, and problems in the equipment, and to recover and restore its normal operation and performance.');
            } elseif (preg_match('/Asset Management|Inventory|Control|Valuation/i', $message)) {
                $botman->reply('Comprehensive, optimal, and strategic asset management of assets, equipment, machinery, facilities, and electrical systems is carried out using asset management techniques, tools, and practices, such as inventory, control, valuation, life cycle analysis, and asset optimization, to maximize value, performance, utility, and return on investment of assets, and to optimize availability, reliability, efficiency, and sustainability of equipment.');
            } elseif (preg_match('/Equipment Operation|Handling|Control|Functioning/i', $message)) {
                $botman->reply('Efficient, safe, and controlled operation of equipment, machinery, facilities, and electrical systems is carried out using operation techniques, tools, and procedures, such as manuals, guides, protocols, and operational controls, to guarantee operability, performance, efficiency, and safety in the operation of the equipment, and to minimize risks, failures, breakdowns, wear, and impacts in the operation and functioning of the equipment.');
            } elseif (preg_match('/Training and Development|Training|Development|Skills/i', $message)) {
                $botman->reply('Continuous and specialized training and development in operation and maintenance of equipment, machinery, facilities, and electrical systems is provided through training programs, courses, workshops, and training sessions, to develop, update, and strengthen technical, operational, and professional competencies, skills, knowledge, and capacities in the equipment, and to promote a culture of excellence, safety, and continuous improvement in operation and maintenance.');
            } elseif (preg_match('/Safety in Operation|Regulations|Procedures|Protocols/i', $message)) {
                $botman->reply('Integral and operational safety in the operation and maintenance of equipment, machinery, facilities, and electrical systems is ensured through compliance, application, and monitoring of regulations, procedures, protocols, standards, and safety practices, such as OSHA, NFPA, and NOMs, to prevent, control, mitigate, and manage risks, hazards, accidents, incidents, and emergencies in the operation and maintenance of equipment.');
            } elseif (preg_match('/Monitoring Technologies|Monitoring|Telemetry|Sensors/i', $message)) {
                $botman->reply('Advanced monitoring technology, telemetry, sensors, and remote diagnosis are used in the operation and maintenance of equipment, machinery, facilities, and electrical systems, through the implementation, integration, and application of monitoring and diagnosis systems, platforms, devices, and tools, to collect, analyze, interpret, and visualize data, information, and performance indicators, and to ensure availability, reliability, performance, and efficiency in the operation and maintenance of equipment.');
            } elseif (preg_match('/Energy Efficiency|Optimization|Sustainability|Conservation/i', $message)) {
                $botman->reply('Energy efficiency, optimization, sustainability, and conservation of energy are promoted and implemented in the operation and maintenance of equipment, machinery, facilities, and electrical systems through the application of energy management techniques, tools, practices, and technologies, such as energy audits, efficiency programs, renewable energy, and energy-saving measures, to reduce consumption, costs, emissions, and environmental impact, and to improve energy performance and sustainability in the operation and maintenance of equipment.');
            } elseif (preg_match('/Environmental Management|Environmental|Sustainability|Conservation/i', $message)) {
                $botman->reply('Environmental management, sustainability, conservation, and protection of the environment are promoted and implemented in the operation and maintenance of equipment, machinery, facilities, and electrical systems through the application of environmental management techniques, tools, practices, and technologies, such as environmental regulations, standards, certifications, and environmental impact assessments, to prevent, mitigate, control, and manage environmental impacts, risks, pollution, emissions, waste, and environmental aspects in the operation and maintenance of equipment.');
            } elseif (preg_match('/Quality Management|Quality|Excellence|Improvement/i', $message)) {
                $botman->reply('Quality management, excellence, and continuous improvement in the operation and maintenance of equipment, machinery, facilities, and electrical systems are promoted and implemented through the application of quality management techniques, tools, practices, and methodologies, such as ISO standards, quality assurance, quality control, inspections, audits, and quality improvement programs, to ensure compliance, satisfaction, reliability, performance, and excellence in the operation and maintenance of equipment.');
            } elseif (preg_match('/Innovation|Innovative|Creativity|Development/i', $message)) {
                $botman->reply('Innovation, creativity, and technological development are promoted and implemented in the operation and maintenance of equipment, machinery, facilities, and electrical systems through the implementation and application of innovation management techniques, tools, practices, and methodologies, such as R&D, prototypes, pilots, technological scouting, and innovation projects, to foster innovation, competitiveness, differentiation, and technological leadership in the operation and maintenance of equipment.');
            } elseif (preg_match('/Information Management|Data|Information|Knowledge|Systems/i', $message)) {
                $botman->reply('Effective and efficient information management, data, information, and knowledge in the operation and maintenance of equipment, machinery, facilities, and electrical systems are promoted and implemented through the application and integration of information management techniques, tools, practices, and technologies, such as databases, information systems, digital platforms, analytics, and knowledge management, to ensure access, availability, integrity, security, analysis, interpretation, and use of information and knowledge in the operation and maintenance of equipment.');
            } elseif (preg_match('/Communication|Collaboration|Teamwork|Integration/i', $message)) {
                $botman->reply('Effective communication, collaboration, teamwork, and integration are promoted and implemented in the operation and maintenance of equipment, machinery, facilities, and electrical systems through the implementation and application of communication techniques, tools, practices, and technologies, such as communication plans, meetings, teamwork, collaboration platforms, and integration systems, to ensure alignment, coordination, cooperation, and synergy in the operation and maintenance of equipment.');
            } elseif (preg_match('/Financial Management|Budget|Cost|Investment|ROI/i', $message)) {
                $botman->reply('Optimal financial management, budget, cost control, investment, and ROI in the operation and maintenance of equipment, machinery, facilities, and electrical systems are promoted and implemented through the application of financial management techniques, tools, practices, and methodologies, such as budgets, cost analysis, financial planning, investments, and financial evaluation, to optimize financial resources, costs, investments, profitability, and return on investment in the operation and maintenance of equipment.');
            }elseif (preg_match('/Review Process|Review|Accepted|Rejected|Correction/i', $message)) {
                $botman->reply('At DisSuper, each document goes through a life cycle that starts with submission for review and subsequent acceptance. If it is rejected, it is sent back for review with a comment stating the reason for rejection, and once corrected, the process starts over.');
            } elseif (preg_match('/Printing and Signing|Print|Sign|Acknowledged Signature/i', $message)) {
                $botman->reply('After being accepted at DisSuper, the user who created the document must print it and have it signed by the employee it belongs to. Once this is done, the document is stored without any issues.');
            } elseif (preg_match('/Document Cancellation|Cancel Document|Cancelled|Cancellation/i', $message)) {
                $botman->reply('Higher-ranking users at DisSuper have the power to cancel documents. However, this action is recorded in the history with the reason for cancellation, who cancelled it, and the date and time of the action.');
            } elseif (preg_match('/Table Filtering|Filter|Export to Excel|Export to PDF|Direct Printing/i', $message)) {
                $botman->reply('At DisSuper, all tables have the option to filter by any of the table fields, and there is also the option to export the table to Excel, PDF, or print directly for better organization and information management.');
            }
            
            
            
            
            
            elseif (preg_match('/Technical Support|Support|Help|Assistance/i', $message)) {
                $botman->reply('To get support or help at DisSuper, you can contact the technical support team through the internal chat or send an email to resolve any doubts or issues related to the app.');
            } elseif (preg_match('/Document Registration|Register Document|Registration|Document/i', $message)) {
                $botman->reply('To register a document in DisSuper, you need to go to the corresponding employee profile, access the documents section, and upload the document by filling in the required fields or uploading a PDF directly.');
            } elseif (preg_match('/Document Visibility|Visibility|Access|Permission/i', $message)) {
                $botman->reply('At DisSuper, document visibility can be configured to determine who can access and view each document, ensuring privacy and confidentiality of the information.');
            } elseif (preg_match('/Comments and Notes|Comments|Notes|Review Comments/i', $message)) {
                $botman->reply('During the review process in DisSuper, comments and notes can be added to provide feedback and clarifications on the document, facilitating its correction and approval.');
            } elseif (preg_match('/Alerts and Reminders|Alerts|Reminders|Review Alerts/i', $message)) {
                $botman->reply('DisSuper has automatic alerts and reminders that notify you about pending review documents, accepted documents, rejected documents, and other important updates in real-time.');
            } elseif (preg_match('/Advanced Search|Search|Advanced Filter|Field Search/i', $message)) {
                $botman->reply('At DisSuper, you can perform an advanced search and filter tables by any of the table fields, making it easier to locate and manage information.');
            } elseif (preg_match('/Export History|Export|History|Export to Excel|Export to PDF/i', $message)) {
                $botman->reply('DisSuper allows you to export the history of documents and activities to Excel, PDF, or print directly to maintain an organized and accessible record of all actions taken.');
            } elseif (preg_match('/Security and Privacy|Security|Privacy|Encryption|Encrypted Passwords/i', $message)) {
                $botman->reply('The security and privacy of information at DisSuper is a priority. All passwords are encrypted, and advanced security measures are used to protect your personal data and documents.');
            } elseif (preg_match('/Features and Updates|Features|Updates|New Features/i', $message)) {
                $botman->reply('DisSuper is constantly updated with new features and improvements to offer you an enhanced user experience tailored to your needs and requirements.');
            } elseif (preg_match('/Support and Assistance|Support|Help|Assistance|Contact/i', $message)) {
                $botman->reply('To get support or assistance at DisSuper, you can contact the technical support team through the internal chat, send an email, or access the help section to resolve any doubts or issues related to the app.');
            } elseif (preg_match('/Custom Notifications|Notifications|Customize Notifications/i', $message)) {
                $botman->reply('At DisSuper, you can customize notifications to receive specific alerts about documents, activities, and updates that are relevant to you, adapting to your preferences and needs.');
            } elseif (preg_match('/Audit and Control|Audit|Control|Activity Log/i', $message)) {
                $botman->reply('DisSuper has an audit and control feature that records all activities and actions taken on the platform, providing detailed and transparent tracking of changes and updates.');
            } elseif (preg_match('/System Integration|Integration|Systems|API/i', $message)) {
                $botman->reply('DisSuper allows integration with other systems and applications through APIs, facilitating process automation and data synchronization between different platforms.');
            } elseif (preg_match('/Mobile Access|Access|Mobile App|Mobile Devices/i', $message)) {
                $botman->reply('DisSuper is available on mobile devices with an optimized app to offer you quick, easy, and secure mobile access to all platform functionalities and features.');
            } elseif (preg_match('/Interface Customization|Customization|Interface|Settings/i', $message)) {
                $botman->reply('At DisSuper, you can customize the interface and configure display preferences to adapt the platform to your needs and enhance your user experience.');
            } elseif (preg_match('/Training and Development|Training|Development|Tutorials/i', $message)) {
                $botman->reply('DisSuper offers training and development to users to ensure effective and efficient use of the platform, providing tutorials, guides, and educational resources to familiarize yourself with all available functionalities and tools.');
            } elseif (preg_match('/Feedback and Suggestions|Feedback|Suggestions|Improvements/i', $message)) {
                $botman->reply('We value your feedback and suggestions at DisSuper to continuously improve the platform and adapt it to your needs and requirements, ensuring a satisfactory and personalized user experience.');
            } elseif (preg_match('/Advanced Features|Features|Advanced|Characteristics/i', $message)) {
                $botman->reply('DisSuper offers advanced features and innovative characteristics to provide you with more efficient, productive, and adapted document and activity management in line with current market demands.');
            } elseif (preg_match('/Security Updates|Updates|Security|Security Patches/i', $message)) {
                $botman->reply('At DisSuper, we regularly implement security updates and security patches to protect your personal data, documents, and activities from potential threats and vulnerabilities.');
            } elseif (preg_match('/Backup and Recovery|Backup|Recovery|Backup Copy/i', $message)) {
                $botman->reply('DisSuper performs automatic backups and offers recovery options to ensure the integrity and availability of your data, documents, and settings in case of loss or failure.');
            } elseif (preg_match('/Collaboration and Teamwork|Collaboration|Teamwork|Share Documents/i', $message)) {
                $botman->reply('DisSuper facilitates collaboration and teamwork by allowing you to share documents, assign tasks, and collaborate efficiently and effectively with other users and departments within the platform.');
            } elseif (preg_match('/Analysis and Reports|Analysis|Reports|Insights/i', $message)) {
                $botman->reply('At DisSuper, you can generate detailed analyses and reports on your documents, activities, and processes to gain insights and make informed decisions, improving the management and optimization of your operations.');
            } elseif (preg_match('/Permission and Role Management|Permission Management|Roles|Permission Configuration/i', $message)) {
                $botman->reply('DisSuper offers personalized permission and role management that allows you to configure and assign specific permissions to users, controlling access and allowed actions within the platform.');
            } elseif (preg_match('/Productivity Tools Integration|Integration|Productivity Tools|Office Integration/i', $message)) {
                $botman->reply('DisSuper integrates with major productivity tools and office suites, such as Microsoft Office, Google Workspace, and other applications, facilitating the import and export of documents and data.');
            } elseif (preg_match('/Process Automation|Automation|Processes|Workflow/i', $message)) {
                $botman->reply('DisSuper offers process automation and workflow functionalities to optimize and streamline repetitive tasks and activities, improving efficiency and productivity in document and operation management.');
            }
            
            
            
            
            elseif (preg_match('/Intuitive Interface and Usability|Intuitive Interface|Usability|User-Friendly Design/i', $message)) {
                $botman->reply('The DisSuper interface is intuitive, and the design is user-friendly, offering simple and accessible usability for all users, regardless of their level of experience and technical knowledge.');
            } elseif (preg_match('/Report Customization|Customization|Reports|Report Configuration/i', $message)) {
                $botman->reply('At DisSuper, you can customize the reports generated to adapt them to your specific needs and requirements, selecting the data, metrics, and visualizations you want to include in each report.');
            } elseif (preg_match('/Multilingual Support|Support|Multilingual|Languages/i', $message)) {
                $botman->reply('DisSuper offers multilingual support and is available in various languages to facilitate communication and collaboration between users from different regions and nationalities, adapting to the global needs of your organization.');
            } elseif (preg_match('/Document Digitization|Digitization|Electronic Documents|Paperless/i', $message)) {
                $botman->reply('DisSuper is designed to facilitate document digitization and reduce paper usage, offering a complete electronic history to improve organization, accessibility, and information management.');
            } elseif (preg_match('/Process Streamlining|Streamlining|Processes|Quick and Efficient/i', $message)) {
                $botman->reply('With DisSuper, you can streamline your organization\'s processes, optimize administrative tasks, automate workflows, and reduce response and document management times.');
            } elseif (preg_match('/Notifications and Alerts|Notifications|Alerts|Real-Time Information/i', $message)) {
                $botman->reply('DisSuper keeps users informed with real-time notifications and alerts about their activities, pending tasks, documents to review, and important updates to ensure effective communication and proactive management.');
            } elseif (preg_match('/Intuitive and Easy to Use|Intuitive|Usability|User-Friendly Design/i', $message)) {
                $botman->reply('DisSuper is designed with an intuitive interface and a user-friendly design to offer users a simple, accessible, and efficient user experience, allowing them to perform their tasks and activities intuitively and without complications.');
            } elseif (preg_match('/Automatic Email Sending|Email Sending|Email|Email Notifications/i', $message)) {
                $botman->reply('DisSuper facilitates automatic email sending to inform, notify, and keep users updated about their activities, assigned tasks, documents to review, and other important updates quickly and effectively.');
            } elseif (preg_match('/Remote and Mobile Access|Remote Access|Mobile Access|Work from Anywhere/i', $message)) {
                $botman->reply('DisSuper allows remote and mobile access so that users can perform their tasks and activities from anywhere and any device, offering flexibility, mobility, and adaptability to current work styles and needs.');
            } elseif (preg_match('/Security and Confidentiality|Security|Confidentiality|Data Protection/i', $message)) {
                $botman->reply('The security and confidentiality of information at DisSuper is a priority, implementing data protection measures and encryption to guarantee the integrity, privacy, and security of your documents, activities, and communications.');
            } elseif (preg_match('/Resource Optimization|Optimization|Resources|Operational Efficiency/i', $message)) {
                $botman->reply('DisSuper contributes to the optimization of resources and operational efficiency of your organization, allowing better management and utilization of human, material, and technological resources through centralized and automated processes.');
            } elseif (preg_match('/How can I register a new document?|Register Document|New Document/i', $message)) {
                $botman->reply('To register a new document, you need to go to the corresponding employee profile, access the documents section, and upload the document by filling in the required fields or uploading a PDF directly.');
            } elseif (preg_match('/How can I check my notifications?|Check Notifications|Pending Notifications/i', $message)) {
                $botman->reply('You can check your notifications in the platform\'s notifications section, where you will find all alerts, messages, and important updates related to your activities and assigned tasks.');
            } elseif (preg_match('/How can I change my password?|Change Password|Reset Password/i', $message)) {
                $botman->reply('To change your password, go to the settings section of your profile, select the change password option, and follow the indicated steps to set a new secure and confidential password.');
            } elseif (preg_match('/How can I access my document history?|Document History|View History/i', $message)) {
                $botman->reply('You can access your document history in the corresponding section of your profile, where you will find a complete record of all the documents you have registered, reviewed, and managed on the platform.');
            } elseif (preg_match('/How can I request technical support?|Technical Support|Help/i', $message)) {
                $botman->reply('To request technical support, you can contact the support team through the platform\'s internal chat, send an email to the technical support team, or access the help section to get assistance and resolve any doubts or issues related to the platform.');
            } elseif (preg_match('/How can I export a report?|Export Report|Generate Report/i', $message)) {
                $botman->reply('To export a report, go to the corresponding reports section and select the export report option, where you can choose the desired format (Excel, PDF) and customize the report according to your needs and requirements.');
            } elseif (preg_match('/How can I customize my notifications?|Customize Notifications|Notification Settings/i', $message)) {
                $botman->reply('You can customize your notifications in the notification settings section, where you can select and configure the alerts, messages, and updates you want to receive, adapting to your specific preferences and needs.');
            } elseif (preg_match('/How can I request training?|Training|Request Training/i', $message)) {
                $botman->reply('To request training, you can contact the human resources department or the technical support team to coordinate and schedule a personalized training session according to your needs and requirements.');
            } elseif (preg_match('/How can I verify my assigned tasks?|Assigned Tasks|Verify Tasks/i', $message)) {
                $botman->reply('You can verify your assigned tasks in the platform\'s tasks section, where you will find a complete list of pending, in-progress, and completed tasks, as well as detailed information and delivery deadlines for each task.');
            } elseif (preg_match('/how do I add an indicator/i', $message)) {
                $botman->reply('To add an indicator, you need to have the necessary permissions. If you do, you just need to go to the indicators section and add it.');
            }elseif (preg_match('/how do I see my salary/i', $message)) {
                $botman->reply('You can check your contract, your payroll, or ask your superior.');
            } elseif (preg_match('/a document did not reach me/i', $message)) {
                $botman->reply('If a document generated by someone else did not reach you, ask them to make sure they sent it to the correct person. If they did, report the issue to the system administrator and provide them with the document information.');
            } elseif (preg_match('/order of documents/i', $message)) {
                $botman->reply('Documents are generated in the following order: 2 accountability reports, 1 warning call, and 1 administrative record.');
            } elseif (preg_match('/what is a warning call/i', $message)) {
                $botman->reply('A warning call is a document generated when an employee has failed to meet their indicators in 3 or more tasks.');
            } 






            elseif (preg_match('/where to add an employee/iu', $message)) {
                $botman->reply('To create employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/how to create an employee/iu', $message)) {
                $botman->reply('To create employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/can I create an employee/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to add employees/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/how to add employees/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/can I add employees/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/Where can I find my code of ethics?|Code of Ethics|View Code of Ethics/i', $message)) {
                $botman->reply('Your code of ethics was sent to you by email when you registered on the platform. If you need to consult it again, you can access your email or contact the human resources department to obtain a copy.');
            }elseif (preg_match('/How can I export an employee\'s history and documents?|Export History|Export Documents/i', $message)) {
                $botman->reply('To export an employee\'s history and documents, you need to go to the employee list, select the corresponding employee, access the documents section, and use the export option to generate a complete report in the desired format (Excel, PDF) with all the information and documents associated with the employee.');
            } elseif (preg_match('/How can I reset my password?|Reset Password|Forgot my Password/i', $message)) {
                $botman->reply('To reset your password, you need to go to the platform\'s login section, select the "Forgot my password" option, and enter your email address to receive the instructions and the password reset link.');
            } elseif (preg_match('/How can I generate an administrative record?|Generate Record|Administrative Record/i', $message)) {
                $botman->reply('To generate an administrative record, you need to go to the corresponding profile, access the administrative records section, and follow the indicated steps to complete and submit the administrative record correctly and according to the established procedures.');
            } elseif (preg_match('/How can I manually upload a document?|Upload Document|Manual Document/i', $message)) {
                $botman->reply('To manually upload a document, you need to go to the corresponding profile, access the documents section, select the upload document option, fill in the required fields, and follow the indicated steps to complete and submit the document correctly.');
            } elseif (preg_match('/How can I check the status of a document sent for review?|Document Status|Check Status/i', $message)) {
                $botman->reply('You can check the status of a document sent for review in the corresponding documents section, where you will find the current status of the document, the assigned reviewees, and the history of actions taken on the document during the review process.');
            } elseif (preg_match('/How can I redirect a document to another user for review?|Redirect Document|Redirect Review/i', $message)) {
                $botman->reply('To redirect a document to another user for review, you need to go to the corresponding documents section, select the document sent for review, choose the redirect option, and select the new user assigned for the document review.');
            } elseif (preg_match('/How can I contact technical support?|Contact Support|Technical Support/i', $message)) {
                $botman->reply('To contact technical support, you can use the platform\'s internal chat, send an email to the technical support team, or access the help and support section to get assistance and resolve any doubts or issues related to the platform.');
            } elseif (preg_match('/How can I cancel a document?|Cancel Document|Cancelled Document/i', $message)) {
                $botman->reply('To cancel a document, you need to go to the corresponding profile, access the documents section, select the document you want to cancel, choose the cancel option, and provide the reason and justification for canceling the document.');
            } elseif (preg_match('/How can I filter the employee list by department?|Filter List|Filter by Department/i', $message)) {
                $botman->reply('You can filter the employee list by department in the corresponding employee list section, where you will find filtering options by department, position, status, and other criteria to personalize and optimize the visualization of the employee list.');
            } elseif (preg_match('/How can I export an employee\'s history?|Export Employee History|Employee History/i', $message)) {
                $botman->reply('To export an employee\'s history, you need to go to the corresponding profile, access the employee history section, select the employee you want to export, and follow the indicated steps to export the employee\'s complete history in the desired format (Excel, PDF).');
            } elseif (preg_match('/What is the mission of CFE?|CFE Mission/i', $message)) {
                $botman->reply('The mission of the Federal Electricity Commission (CFE) is to generate, transmit, distribute, and market quality, reliable, and safe electric energy, contributing to sustainable development and the well-being of Mexican society.');
            } elseif (preg_match('/What is the vision of CFE?|CFE Vision/i', $message)) {
                $botman->reply('The vision of the Federal Electricity Commission (CFE) is to be a leading company in the electrical sector, recognized for its operational excellence, technological innovation, and commitment to sustainable development, promoting economic and social growth in Mexico.');
            } elseif (preg_match('/What is the National Energy Development Plan?|National Energy Development Plan/i', $message)) {
                $botman->reply('The National Energy Development Plan is a strategic and programmatic document that establishes the policies, objectives, goals, and priority actions for the integral and sustainable development of the energy sector in Mexico, including the generation, transmission, distribution, and marketing of electric energy.');
            } elseif (preg_match('/What is CFE\'s objective regarding sustainability?|CFE Sustainability Objective/i', $message)) {
                $botman->reply('The objective of the Federal Electricity Commission (CFE) regarding sustainability is to promote and adopt sustainable practices and technologies in its operations and projects, minimizing environmental impact, optimizing the use of natural resources, and contributing to climate change mitigation.');
            } elseif (preg_match('/What is the importance of energy efficiency for CFE?|Energy Efficiency in CFE/i', $message)) {
                $botman->reply('Energy efficiency is of great importance for the Federal Electricity Commission (CFE) as it allows maximizing the use of available energy resources, reducing operating costs, improving competitiveness, meeting energy demand sustainably, and fulfilling greenhouse gas emission reduction commitments.');
            } elseif (preg_match('/What is the CFE Energy Sustainability Fund?|CFE Energy Sustainability Fund/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) Energy Sustainability Fund is a financial mechanism created to support and promote energy efficiency, renewable energy, and sustainable development projects and programs in the electrical sector, contributing to diversifying the energy matrix, energy security, and climate change mitigation.');
            } elseif (preg_match('/What is IMSS and what is its relationship with CFE?|IMSS and CFE/i', $message)) {
                $botman->reply('The IMSS (Mexican Social Security Institute) is a governmental entity responsible for administering the social security system in Mexico, providing health services, pensions, and benefits to workers and their families. CFE has a labor relationship with IMSS to ensure the protection and well-being of its employees, complying with legal obligations and providing access to medical and social services.');
            } elseif (preg_match('/What is CFE\'s diversity and inclusion policy?|CFE Diversity and Inclusion/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) promotes a diversity and inclusion policy that values and respects gender, age, ethnic origin, disability, sexual orientation, religion, and work experience diversity of its employees, fostering an inclusive, equitable, and discrimination-free work environment where all employees can develop their potential and contribute to the organization\'s success.');
            } 
            
            
            
            
            
            elseif (preg_match('/How can I access IMSS health services as a CFE employee?|IMSS Health Services/i', $message)) {
                $botman->reply('As an employee of the Federal Electricity Commission (CFE), you can access IMSS health services through your affiliation to the Mexican Social Security Institute, providing your social security number and complying with the registration and update requirements of personal data in the IMSS system.');
            } elseif (preg_match('/What is SAT and what is its relationship with CFE?|SAT and CFE/i', $message)) {
                $botman->reply('The SAT (Tax Administration Service) is a governmental entity responsible for administering and supervising the tax system in Mexico, collecting taxes, rights, and fiscal contributions to finance public spending and ensure compliance with tax obligations. CFE has a relationship with SAT to comply with tax obligations, file tax returns, pay taxes, and contribute to the economic and social development of the country.');
            } elseif (preg_match('/What is CFE\'s training and development program?|CFE Training and Development Program/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) offers a training and professional development program for its employees, designed to strengthen and update the competencies, skills, and specialized technical, managerial, and specialized technical knowledge required in the electrical sector, promoting excellence, innovation, and continuous improvement in the organization\'s operations and services.');
            } elseif (preg_match('/How can I participate in CFE\'s volunteer program?|CFE Volunteer Program/i', $message)) {
                $botman->reply('You can participate in the Federal Electricity Commission (CFE) volunteer program through registration and registration in the available volunteer calls and projects, collaborating in social, environmental, and community activities and projects, contributing to the well-being and development of the communities and vulnerable sectors served by the organization.');
            } elseif (preg_match('/What is CFE\'s Board of Directors?|CFE Board of Directors/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) Board of Directors is the collegiate body responsible for making strategic decisions, supervising and directing the organization, made up of representatives of the government, business sector, academia, and civil society, guiding and guiding the management, operation, and policies of CFE, ensuring transparency, accountability, and compliance with institutional objectives.');
            } elseif (preg_match('/What is the Trust Fund for Electric Energy Savings (FIDE)?|FIDE and CFE/i', $message)) {
                $botman->reply('The Trust Fund for Electric Energy Savings (FIDE) is a governmental entity dedicated to promoting and financing energy efficiency projects and programs and rational energy use in Mexico, promoting the adoption of sustainable technologies and practices, and collaborating with the Federal Electricity Commission (CFE) in the implementation of energy savings and efficiency actions in the electrical sector and the national energy market.');
            } elseif (preg_match('/What is CFE\'s ethics and values policy?|CFE Ethics and Values Policy/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) promotes an ethics and values policy that guides and directs the conduct, responsibility, and commitment of its employees, executives, and collaborators in the exercise of their functions and work activities, fostering integrity, honesty, transparency, respect, equity, and professionalism in all actions and decisions made for the benefit of the organization and Mexican society.');
            } elseif (preg_match('/How can I obtain information about CFE\'s tenders and contracts?|CFE Tenders and Contracts/i', $message)) {
                $botman->reply('You can obtain information about the Federal Electricity Commission (CFE) tenders and contracts through the official CFE procurement and acquisition portal, where the calls, bases, requirements, procedures, results, and documentation related to the tender, award, and contracting processes of goods, services, and works for the operation and projects of the organization are published.');
            } elseif (preg_match('/What is CFE\'s Code of Ethics?|CFE Code of Ethics/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) Code of Ethics is a set of principles, values, and norms that guide the conduct and responsibility of employees and collaborators in their work.');
            } elseif (preg_match('/What is the usefulness of CFE\'s Code of Ethics?|Usefulness of CFE\'s Code of Ethics/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) Code of Ethics serves to promote integrity, honesty, transparency, and professionalism in all work activities and decisions.');
            } elseif (preg_match('/What are the principles of CFE\'s Code of Ethics?|Principles of CFE\'s Code of Ethics/i', $message)) {
                $botman->reply('The principles of the Federal Electricity Commission (CFE) Code of Ethics include integrity, honesty, transparency, respect, responsibility, loyalty, and commitment.');
            } elseif (preg_match('/What responsibilities do employees have according to CFE\'s Code of Ethics?|Responsibilities of CFE\'s Code of Ethics/i', $message)) {
                $botman->reply('According to the Federal Electricity Commission (CFE) Code of Ethics, employees have the responsibility to act with integrity, honesty, transparency, and respect in their work.');
            } elseif (preg_match('/What behaviors are prohibited according to CFE\'s Code of Ethics?|Prohibited Behaviors of CFE\'s Code of Ethics/i', $message)) {
                $botman->reply('The Federal Electricity Commission (CFE) Code of Ethics prohibits behaviors such as fraud, corruption, bribery, conflict of interest, workplace harassment, discrimination, and misuse of resources.');
            } elseif (preg_match('/How is an ethical culture promoted in CFE?|Promotion of Ethical Culture in CFE/i', $message)) {
                $botman->reply('The CFE promotes the ethical culture through training, communication of the Code of Ethics, recognition of exemplary behaviors, and complaint channels.');
            } elseif (preg_match('/What happens if CFE\'s Code of Ethics is not followed?|Sanctions for Not Following CFE\'s Code of Ethics/i', $message)) {
                $botman->reply('If the Federal Electricity Commission (CFE) Code of Ethics is not followed, disciplinary sanctions and labor consequences can be applied.');
            } elseif (preg_match('/What is integrity?|Integrity/i', $message)) {
                $botman->reply('Integrity refers to acting with rectitude, honesty, and honesty in all work activities.');
            } elseif (preg_match('/What does commitment mean?|Commitment/i', $message)) {
                $botman->reply('Commitment implies dedication, responsibility, and loyalty to the organization, its objectives, and society.');
            } elseif (preg_match('/What is transparency?|Transparency/i', $message)) {
                $botman->reply('Transparency refers to acting with clarity, frankness, and openness in work activities, avoiding the concealment of information.');
            } elseif (preg_match('/What is respect understood as?|Respect/i', $message)) {
                $botman->reply('Respect implies recognizing and valuing the rights, opinions, differences, and dignity of people in the work environment.');
            } elseif (preg_match('/What is loyalty?|Loyalty/i', $message)) {
                $botman->reply('Loyalty refers to acting with fidelity, commitment, and support towards the organization, its values, and objectives, avoiding conflicts of interest.');
            } elseif (preg_match('/What is considered a conflict of interest?|Conflict of Interest/i', $message)) {
                $botman->reply('A conflict of interest occurs when an employee\'s personal, family, or financial interests affect or may affect their objectivity, impartiality, and responsibility at work.');
            } elseif (preg_match('/How are violations of the Code of Ethics reported?|Reporting Violations/i', $message)) {
                $botman->reply('Violations of the Code of Ethics can be reported through the complaint and reporting channels established by the organization, ensuring confidentiality, protection, and follow-up of the information provided.');
            } elseif (preg_match('/What happens after reporting a violation?|Process After Reporting Violation/i', $message)) {
                $botman->reply('After reporting a violation of the Code of Ethics, an investigation, evaluation, and analysis of the situation are carried out, applying the measures, sanctions, and corrective actions corresponding to ensure compliance and respect for the ethical and conduct principles of the organization.');
            } elseif (preg_match('/What is confidentiality?|Confidentiality/i', $message)) {
                $botman->reply('Confidentiality refers to protecting and safeguarding information, data, documents, and internal and external communications of the organization, avoiding its disclosure, unauthorized access, and misuse.');
            } elseif (preg_match('/What is understood by workplace harassment?|Workplace Harassment/i', $message)) {
                $botman->reply('Workplace harassment is defined as any conduct, action, behavior, comment, or situation that causes intimidation, harassment, humiliation, discrimination, or psychological mistreatment in the work environment.');
            } 






            elseif (preg_match('/How to add a new user in DisSuper?|Add new user/i', $message)) {
                $botman->reply('To add a new user in DisSuper, their employee profile is automatically generated when added.');
            } elseif (preg_match('/What can be done on the DisSuper platform?|functionalities/i', $message)) {
                $botman->reply('On DisSuper, you can add new users, modify employee profiles, add indicators, manage positions and work zones, assign activities to positions, and perform actions like accountability and attention calls.');
            } elseif (preg_match('/What are the indicators in DisSuper?|Indicators in DisSuper/i', $message)) {
                $botman->reply('Indicators in DisSuper are aspects to be evaluated in an attention call or accountability, they have a specific code and a minimum acceptable value.');
            } elseif (preg_match('/How are positions managed in DisSuper?|Manage positions /i', $message)) {
                $botman->reply('In DisSuper, positions can be added, modified, and deleted, which are linked to the work zone and have associated position activities.');
            } elseif (preg_match('/What are the position activities in DisSuper?|Position activities/i', $message)) {
                $botman->reply('Position activities in DisSuper are specific tasks related to a job position, they can be added, modified, and deleted, and are linked to existing positions.');
            } elseif (preg_match('/How are zones managed in DisSuper?|Manage zones|add zones/i', $message)) {
                $botman->reply('In DisSuper, the zones where an employee is located can be added, and each employee has at least one assigned zone.');
            } elseif (preg_match('/What are roles in DisSuper?|Roles/i', $message)) {
                $botman->reply('Roles in DisSuper describe a user and have specific functionalities assigned, complementing the information of activities, contracts, and zones.');
            } elseif (preg_match('/How is employee information updated in DisSuper?|Update employee information/i', $message)) {
                $botman->reply('Employee information in DisSuper can be updated in the profile section, or a supervisor can modify the data in case of errors.');
            } elseif (preg_match('/How are activities assigned to a position in DisSuper?|Assign activities to position/i', $message)) {
                $botman->reply('In DisSuper, activities are assigned to a specific position from the position activities section, where tasks related to that position can be selected and added.');
            } elseif (preg_match('/What is accountability in DisSuper?|Accountability/i', $message)) {
                $botman->reply('Accountability in DisSuper is a process to present and justify the actions and results obtained in a specific period, ensuring transparency and responsibility in job performance.');
            } elseif (preg_match('/How is an attention call made in DisSuper?|Attention call/i', $message)) {
                $botman->reply('In DisSuper, an attention call is made by selecting the corresponding indicator and registering the necessary details and observations, to identify and correct areas for improvement in job performance.');
            } elseif (preg_match('/What is a contract in DisSuper?|Contract/i', $message)) {
                $botman->reply('A contract in DisSuper is a formal agreement that establishes the conditions, responsibilities, obligations, and rights between the employee and the organization, ensuring compliance with the company\'s rules and policies.');
            } elseif (preg_match('/How are contracts added in DisSuper?|Add contracts /i', $message)) {
                $botman->reply('In DisSuper, new contracts can be added from the corresponding section, entering the required information and specifying the conditions and terms of the employment agreement.');
            } elseif (preg_match('/What are work zones in DisSuper?|Work zones /i', $message)) {
                $botman->reply('Work zones in DisSuper represent the geographical or departmental areas where an employee performs their work activities, and each employee has at least one specific zone assigned.');
            } elseif (preg_match('/How are roles managed in DisSuper?|Manage roles|add roles/i', $message)) {
                $botman->reply('In DisSuper, user roles are managed from the roles section, assigning specific functionalities and permissions to each type of user, according to their responsibilities and job activities.');
            } elseif (preg_match('/What is a supervisor in DisSuper?|Supervisor/i', $message)) {
                $botman->reply('A supervisor in DisSuper is a user with special permissions to manage and supervise the activities, profiles, contracts, roles, and accountabilities of employees, ensuring compliance with the company\'s rules and policies.');
            } elseif (preg_match('/How is a document review done?|Document review/i', $message)) {
                $botman->reply('In DisSuper, a document review is done by selecting the corresponding document, verifying the provided information and details, and updating the document status according to the review results.');
            } elseif (preg_match('/What is a document in DisSuper?|Document/i', $message)) {
                $botman->reply('A document in DisSuper is an electronic record that contains information, data, contracts, accountabilities, attention calls, and other details related to the work activities and responsibilities of employees.');
            } elseif (preg_match('/How is information exported in DisSuper?|Export information/i', $message)) {
                $botman->reply('In DisSuper, information is exported by selecting the export option in the corresponding section, choosing the desired format (Excel, PDF), and downloading the file with the required information.');
            } elseif (preg_match('/What is an employee profile in DisSuper?|Employee profile/i', $message)) {
                $botman->reply('An employee profile in DisSuper is a section that contains the personal, work, contract, zone, role, and assigned activities information of a specific employee, providing a complete and updated view of their performance and responsibilities.');
            } elseif (preg_match('/How is a user deleted?|Delete user/i', $message)) {
                $botman->reply('To delete a user, access the user management section, select the corresponding user, and confirm the deletion.');
            } elseif (preg_match('/What is a performance indicator?|Performance indicator/i', $message)) {
                $botman->reply('A performance indicator is a metric or measure that evaluates an employee\'s performance and goal achievement, helping to identify areas for improvement and take corrective actions.');
            } elseif (preg_match('/How are activities managed?|Manage activities/i', $message)) {
                $botman->reply('Activities are managed from the corresponding section, where specific tasks assigned to each job position can be added, modified, and deleted.');
            } elseif (preg_match('/What is a job position?|Job position/i', $message)) {
                $botman->reply('A job position is a specific position within the organization, with assigned responsibilities, functions, and activities, and is linked to a work zone and a set of position activities.');
            } elseif (preg_match('/How is a contract assigned to an employee?|Assign contract to employee/i', $message)) {
                $botman->reply('To assign a contract to an employee, select the corresponding employee and add the contract from the contracts section, specifying the terms and conditions of the employment agreement.');
            }
            
            
            
            
            
            elseif (preg_match('/What is a user role?|User role/i', $message)) {
                $botman->reply('A user role defines the functionalities, permissions, and accesses that a user has within the platform, allowing to customize the actions and tasks they can perform according to their profile and responsibilities.');
            } elseif (preg_match('/How is an employee profile modified?|Modify employee profile/i', $message)) {
                $botman->reply('An employee profile is modified from the employee profiles section, updating the personal, work, contract, zone, role, and assigned activities information as needed.');
            } elseif (preg_match('/What is a work zone?|Work zone/i', $message)) {
                $botman->reply('A work zone is a geographical location or departmental area where an employee performs their work activities, and each employee has at least one specific zone assigned.');
            } elseif (preg_match('/How is a role review done?|Role review/i', $message)) {
                $botman->reply('To perform a role review, select the corresponding user role, verify the assigned functionalities and permissions, and update the information according to the required changes.');
            } elseif (preg_match('/What is an accountability document?|Accountability document/i', $message)) {
                $botman->reply('An accountability document is a detailed record that presents and justifies the actions, results, and goal achievement of an employee in a specific period, ensuring transparency and responsibility in job performance.');
            }elseif (preg_match('/How is a contract review done?|Contract review/i', $message)) {
                $botman->reply('To perform a contract review, the corresponding contract is selected, the terms, conditions, and details of the employment agreement are verified, and the information is updated according to the required changes.');
            } elseif (preg_match('/What is a zone supervisor?|Zone supervisor/i', $message)) {
                $botman->reply('A zone supervisor is a user with special permissions to manage and supervise the activities, profiles, contracts, roles, and accountabilities of employees assigned to a specific zone, ensuring compliance with the company\'s rules and policies in that geographical area.');
            } elseif (preg_match('/How is an activity review done?|Activity review/i', $message)) {
                $botman->reply('To perform an activity review, the corresponding activity is selected, the information and details of the assigned task are verified, and the activity status is updated according to the required changes.');
            } elseif (preg_match('/What is a performance report?|Performance report/i', $message)) {
                $botman->reply('A performance report is a document that presents and analyzes the metrics, results, and goal achievement of an employee or work team over a specific period, providing insights and recommendations to improve work performance.');
            } elseif (preg_match('/How are work zones managed?|Manage work zones/i', $message)) {
                $botman->reply('Work zones are managed from the corresponding section, where geographic locations or departmental areas assigned to each employee can be added, modified, and deleted, ensuring an efficient distribution of work responsibilities.');
            } elseif (preg_match('/What is an attention call?|Attention call/i', $message)) {
                $botman->reply('An attention call is a formal process that identifies and communicates to an employee about areas for improvement, errors, or non-compliance in their work performance, with the aim of correcting and enhancing their performance in the company.');
            } elseif (preg_match('/How is a performance indicator review done?|Performance indicator review/i', $message)) {
                $botman->reply('To perform a performance indicator review, the corresponding indicator is selected, the evaluated metric or measure is analyzed, and it is compared with the established objectives and goals, identifying areas for improvement and optimization opportunities.');
            } elseif (preg_match('/What is an employment contract?|Employment contract/i', $message)) {
                $botman->reply('An employment contract is a legal agreement between the employee and the company, establishing the conditions, responsibilities, rights, and obligations of both parties, ensuring compliance with labor laws and respect for the employee\'s labor rights.');
            } elseif (preg_match('/How are activities added to a job position?|Add activities to a job position/i', $message)) {
                $botman->reply('To add activities to a job position, the corresponding position is selected, and specific tasks are added from the position activities section, specifying the responsibilities and functions assigned to each activity.');
            } elseif (preg_match('/What is a supervisor role?|Supervisor role/i', $message)) {
                $botman->reply('A supervisor role is a position with special permissions to manage, supervise, and coordinate the activities, work teams, and projects of a specific area or department, ensuring compliance with established objectives and goals.');
            } elseif (preg_match('/How are user roles managed?|Manage user roles/i', $message)) {
                $botman->reply('User roles are managed from the roles section, where roles assigned to each user can be added, modified, and deleted, specifying the functionalities, permissions, and accesses corresponding to their profile and work responsibilities.');
            } elseif (preg_match('/What is an activity report?|Activity report/i', $message)) {
                $botman->reply('An activity report is a document that presents and details the tasks, actions, results, and achievements accomplished by an employee or work team over a specific period, providing a clear and organized view of work performance.');
            } elseif (preg_match('/How is a work zone review done?|Work zone review/i', $message)) {
                $botman->reply('To perform a work zone review, the corresponding zone is selected, the assigned geographic location or departmental area is verified, and the information is updated according to the required changes for an efficient distribution of work responsibilities.');
            } elseif (preg_match('/What is an Admin?|Admin/i', $message)) {
                $botman->reply('An Admin is a role with administrative permissions to manage and supervise the functionalities, users, roles, and settings of the platform, ensuring the proper functioning and data security.');
            } elseif (preg_match('/What is an immediate leadership?|Immediate leadership/i', $message)) {
                $botman->reply('Immediate leadership performs functions of supervision, coordination, evaluation, and feedback of the activities and performance of a work team, providing support, resources, and necessary direction to achieve established objectives and goals.');
            } elseif (preg_match('/What is a process zone leadership?|Process zone leadership/i', $message)) {
                $botman->reply('Process zone leadership has the role of managing, planning, optimizing, and supervising the operational processes and activities of a specific geographic area, ensuring efficiency, quality, and compliance with established procedures and standards.');
            } elseif (preg_match('/What is a work process zone leadership?|Work process zone leadership/i', $message)) {
                $botman->reply('Work process zone leadership is specialized in supervising and managing the specific activities, tasks, and projects of a geographic area, ensuring the correct implementation, monitoring, and compliance with established procedures and standards.');
            } elseif (preg_match('/What is a zone superintendent?|Zone superintendent/i', $message)) {
                $botman->reply('A Zone superintendent is a role of high direction and supervision responsible for leading, coordinating, evaluating, and making strategic decisions about the operations, work teams, and projects of a specific geographic area, ensuring compliance with corporate objectives, goals, and policies.');
            } elseif (preg_match('/What is a work Submanager?|Work Submanager/i', $message)) {
                $botman->reply('A Work Submanager is a role of management and leadership responsible for supporting, coordinating, and supervising the activities, projects, and work teams of a specific department or area, collaborating in strategic decision-making and developing innovative solutions.');
            } elseif (preg_match('/What is a divisional manager?|Divisional manager/i', $message)) {
                $botman->reply('A Divisional manager is a role of high direction and leadership responsible for directing, planning, evaluating, and making strategic decisions about the operations, strategies, and work teams of a division or corporate area, ensuring growth, development, and business success in the market.');
            }






            elseif (preg_match('/What is a UNIONIZED TEMPORARY contract?|UNIONIZED TEMPORARY contract/i', $message)) {
                $botman->reply('A UNIONIZED TEMPORARY contract is a temporary labor agreement with an employee who is part of a union, where the conditions, responsibilities, and rights are established for a specific period, complying with union regulations and standards.');
            } elseif (preg_match('/What is a UNIONIZED BASE contract?|UNIONIZED BASE contract/i', $message)) {
                $botman->reply('A UNIONIZED BASE contract is an indefinite labor agreement with an employee who is part of a union, where the conditions, responsibilities, and rights are established permanently, guaranteeing respect and compliance with labor rights and union regulations.');
            } elseif (preg_match('/What is a TRUST TEMPORARY contract?|TRUST TEMPORARY contract/i', $message)) {
                $botman->reply('A TRUST TEMPORARY contract is a temporary labor agreement with a trust employee, where the conditions, responsibilities, and rights are established for a specific period, ensuring flexibility and adaptability in the assigned functions and projects.');
            } elseif (preg_match('/What is a TRUST BASE contract?|TRUST BASE contract/i', $message)) {
                $botman->reply('A TRUST BASE contract is an indefinite labor agreement with a trust employee, where the conditions, responsibilities, and rights are established permanently, ensuring stability, commitment, and confidentiality in the assigned functions and projects.');
            } elseif (preg_match('/Admin?|Admin responsibilities/i', $message)) {
                $botman->reply('An Admin is responsible for managing and supervising the functionalities, users, roles, and settings of the platform, ensuring proper functioning, data security, and compliance with established policies and procedures.');
            } elseif (preg_match('/Immediate leadership?|Immediate leadership functions/i', $message)) {
                $botman->reply('Immediate leadership performs functions of supervision, coordination, evaluation, and feedback of the activities and performance of a work team, providing support, resources, and necessary direction to achieve established objectives and goals.');
            } elseif (preg_match('/Process zone leadership?|Process zone leadership role/i', $message)) {
                $botman->reply('Process zone leadership has the role of managing, planning, optimizing, and supervising the operational processes and activities of a specific geographic area, ensuring efficiency, quality, and compliance with established procedures and standards.');
            } elseif (preg_match('/Zone superintendent?|Zone superintendent responsibilities/i', $message)) {
                $botman->reply('A Zone superintendent is responsible for leading, coordinating, evaluating, and making strategic decisions about the operations, work teams, and projects of a specific geographic area, ensuring compliance with objectives, goals, and corporate policies.');
            } elseif (preg_match('/Work Submanager?|Work Submanager functions/i', $message)) {
                $botman->reply('A Work Submanager performs functions of support, coordination, supervision, and leadership in a specific department or area, collaborating in strategic decision-making, developing innovative solutions, and optimizing work resources and processes.');
            } elseif (preg_match('/Divisional manager?|Divisional manager responsibilities/i', $message)) {
                $botman->reply('A Divisional manager is responsible for directing, planning, evaluating, and making strategic decisions about the operations, strategies, and work teams of a division or corporate area, ensuring growth, development, and business success in the market.');
            } elseif (preg_match('/UNIONIZED TEMPORARY contract?|Implications of a UNIONIZED TEMPORARY contract/i', $message)) {
                $botman->reply('A UNIONIZED TEMPORARY contract implies a temporary labor agreement with an employee who is part of a union, where the conditions, responsibilities, and rights are established for a specific period, complying with union regulations and standards.');
            } elseif (preg_match('/UNIONIZED BASE contract?|Conditions of a UNIONIZED BASE contract/i', $message)) {
                $botman->reply('A UNIONIZED BASE contract establishes an indefinite labor agreement with an employee who is part of a union, where the conditions, responsibilities, and rights are established permanently, guaranteeing respect and compliance with labor rights and union regulations.');
            } elseif (preg_match('/TRUST TEMPORARY contract?|Implications of a TRUST TEMPORARY contract/i', $message)) {
                $botman->reply('A TRUST TEMPORARY contract implies a temporary labor agreement with a trust employee, where the conditions, responsibilities, and rights are established for a specific period, ensuring flexibility and adaptability in the assigned functions and projects.');
            } elseif (preg_match('/TRUST BASE contract?|Conditions of a TRUST BASE contract/i', $message)) {
                $botman->reply('A TRUST BASE contract establishes an indefinite labor agreement with a trust employee, where the conditions, responsibilities, and rights are established permanently, ensuring stability, commitment, and confidentiality in the assigned functions and projects.');
            } elseif (preg_match('/What are the steps to update a user\'s role?|Update user\'s role/i', $message)) {
                $botman->reply('To update a user\'s role, you need to access the user management section, select the user whose role you want to update, and then choose the new role from the available options.');
            } elseif (preg_match('/How can I add new employees to the system?|Add new employees/i', $message)) {
                $botman->reply('To add new employees to the system, go to the employee management section, click on "Add New Employee," and fill in the required information for the new employee.');
            } elseif (preg_match('/What is the process for terminating an employee\'s contract?|Terminate employee contract/i', $message)) {
                $botman->reply('To terminate an employee\'s contract, navigate to the contract management section, select the employee\'s contract, and follow the termination process, ensuring compliance with legal and company policies.');
            } elseif (preg_match('/How do I generate a monthly performance report?|Generate performance report/i', $message)) {
                $botman->reply('To generate a monthly performance report, access the reporting section, select the desired timeframe, and choose the performance metrics you want to include in the report.');
            } elseif (preg_match('/What are the key metrics used to evaluate employee performance?|Key metrics for employee performance/i', $message)) {
                $botman->reply('The key metrics used to evaluate employee performance include productivity, quality of work, adherence to deadlines, teamwork, and professional development.');
            } elseif (preg_match('/How can I set up notifications for contract renewals?|Set up contract renewal notifications/i', $message)) {
                $botman->reply('To set up notifications for contract renewals, go to the notification settings section, choose "Contract Renewals," and set the desired notification preferences.');
            } elseif (preg_match('/What is the procedure for requesting time off?|Request time off procedure/i', $message)) {
                $botman->reply('The procedure for requesting time off involves submitting a time-off request through the employee portal, specifying the dates, and waiting for approval from the supervisor or HR department.');
            } elseif (preg_match('/How do I access the training materials for new employees?|Access training materials/i', $message)) {
                $botman->reply('To access the training materials for new employees, go to the training section, select the desired training module, and start the training session.');
            } elseif (preg_match('/What are the requirements for creating a new job position?|Requirements for new job position/i', $message)) {
                $botman->reply('The requirements for creating a new job position include defining the job responsibilities, qualifications, experience, and salary range, and obtaining approval from the HR department.');
            } elseif (preg_match('/How can I track the progress of ongoing projects?|Track project progress/i', $message)) {
                $botman->reply('To track the progress of ongoing projects, access the project management section, select the project you want to monitor, and view the project status, tasks, and milestones.');
            } elseif (preg_match('/What is the process for submitting expenses for reimbursement?|Submit expenses for reimbursement/i', $message)) {
                $botman->reply('The process for submitting expenses for reimbursement involves filling out an expense report, attaching the receipts, and submitting the report for approval through the expense management system.');
            }
            
            
            
            
            
            
            elseif (preg_match('/How do I update my personal information in the system?|Update personal information/i', $message)) {
                $botman->reply('To update your personal information in the system, go to the profile settings section, make the necessary changes, and save the updated information.');
            } elseif (preg_match('/What are the guidelines for conducting performance reviews?|Performance review guidelines/i', $message)) {
                $botman->reply('The guidelines for conducting performance reviews include setting clear objectives, providing constructive feedback, recognizing achievements, and creating a development plan for the employee.');
            } elseif (preg_match('/How can I access historical data for past projects?|Access historical project data/i', $message)) {
                $botman->reply('To access historical data for past projects, go to the project archives section, select the project, and view the historical data, including timelines, milestones, and outcomes.');
            } elseif (preg_match('/What are the steps to create a new department within the organization?|Create new department steps/i', $message)) {
                $botman->reply('The steps to create a new department within the organization include conducting a needs assessment, defining the department\'s objectives and structure, obtaining approval from senior management, and allocating resources.');
            } elseif (preg_match('/How can I schedule a meeting with my supervisor?|Schedule meeting with supervisor/i', $message)) {
                $botman->reply('To schedule a meeting with your supervisor, go to the calendar section, choose a suitable time slot, and send a meeting request to your supervisor.');
            } elseif (preg_match('/What is the policy for remote work and flexible hours?|Remote work policy/i', $message)) {
                $botman->reply('The policy for remote work and flexible hours allows employees to work remotely and adjust their working hours, subject to approval from their supervisor and compliance with company guidelines.');
            } elseif (preg_match('/How do I report a technical issue or bug in the system?|Report technical issue/i', $message)) {
                $botman->reply('To report a technical issue or bug in the system, go to the support section, describe the issue in detail, and submit a support ticket to the IT department.');
            } elseif (preg_match('/What are the procedures for conducting disciplinary actions?|Disciplinary actions procedures/i', $message)) {
                $botman->reply('The procedures for conducting disciplinary actions include investigating the issue, documenting the findings, discussing the issue with the employee, and implementing appropriate corrective actions.');
            } elseif (preg_match('/How can I access the employee handbook and company policies?|Access employee handbook/i', $message)) {
                $botman->reply('To access the employee handbook and company policies, go to the HR resources section, select the desired document, and review the policies and guidelines.');
            } elseif (preg_match('/What is the procedure for updating employee benefits?|Update employee benefits procedure/i', $message)) {
                $botman->reply('The procedure for updating employee benefits involves reviewing the current benefits package, consulting with stakeholders, proposing changes, obtaining approval from management, and communicating the updated benefits to employees.');
            } elseif (preg_match('/How do I register for training courses?|Register for training courses/i', $message)) {
                $botman->reply('To register for training courses, go to the training portal, browse the available courses, select the desired course, and complete the registration form.');
            }   elseif (preg_match('/RPE repeated/iu', $message)) {
                $botman->reply('If you have found a repeated RPE, we ask you to report it to your superior or the system administrator for prompt correction.');
            } elseif (preg_match('/what is the list of users/iu', $message)) {
                $botman->reply('The list of users is the menu where all registered users in the system can be viewed.');
            } elseif (preg_match('/what is the list of indicators/iu', $message)) {
                $botman->reply('The list of indicators is the menu where all registered indicators in the system can be viewed.');
            } elseif (preg_match('/what is "my list"/iu', $message)) {
                $botman->reply('"My list" is the menu where all registered employees in the system can be viewed.');
            } elseif (preg_match('/what is the list of zones/iu', $message)) {
                $botman->reply('The list of zones is the menu where all registered zones in the system can be viewed.');
            } elseif (preg_match('/where is the list of users/iu', $message)) {
                $botman->reply('The list of users is located in the user menu.');
            } elseif (preg_match('/where is the list of employees/iu', $message)) {
                $botman->reply('The list of employees is located in the employee menu, in the "my list" area.');
            }elseif (preg_match('/where is my listing/iu', $message)) {
                $botman->reply('My listing is located in the employees menu');
            } elseif (preg_match('/where is the indicator listing/iu', $message)) {
                $botman->reply('The indicator listing is located in the indicators menu');
            } elseif (preg_match('/where is the position listing/iu', $message)) {
                $botman->reply('The position listing is located in the positions menu');
            } elseif (preg_match('/where is the zone listing/iu', $message)) {
                $botman->reply('The zone listing is located in the zones menu');
            } elseif (preg_match('/where to register users/iu', $message)) {
                $botman->reply('To register users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to register users/iu', $message)) {
                $botman->reply('To register users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/can I register users/iu', $message)) {
                $botman->reply('');
            }
            
            
            
            
            
            elseif (preg_match('/where to register an user/iu', $message)) {
                $botman->reply('To register users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to register an user/iu', $message)) {
                $botman->reply('To register users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/where to add an user/iu', $message)) {
                $botman->reply('To add users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to add an user/iu', $message)) {
                $botman->reply('To add users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/can I add an user/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to add users/iu', $message)) {
                $botman->reply('To add users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to add users/iu', $message)) {
                $botman->reply('To add users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/can I add users/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to create users/iu', $message)) {
                $botman->reply('To create users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to create users/iu', $message)) {
                $botman->reply('To create users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/can I create users/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to create an user/iu', $message)) {
                $botman->reply('To create users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/how to create an user/iu', $message)) {
                $botman->reply('To create users, you need to go to the users menu, select the register user option, and complete the corresponding form');
            } elseif (preg_match('/can I create an user/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to add employees/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/how to add employees/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/can I add an employee/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to add an employee/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/how to add an employee/iu', $message)) {
                $botman->reply('To add employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/can I add an employee/iu', $message)) {
                $botman->reply('');
            } elseif (preg_match('/where to create employees/iu', $message)) {
                $botman->reply('To create employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/how to create employees/iu', $message)) {
                $botman->reply('To create employees, you need to go to the employees menu, select the add employee option, and complete the corresponding form');
            } elseif (preg_match('/can I create employees/iu', $message)) {
                $botman->reply('');
            }elseif (preg_match('/accountability report/i', $message)) {
                $botman->reply('An accountability report is a document generated when an employee has failed to meet an indicator in a task.');
            } elseif (preg_match('/what is an administrative record/i', $message)) {
                $botman->reply('An administrative record is a document generated when an employee has failed to meet an indicator in 4 or more tasks.');
            }
            
            
            
            
            
            elseif (preg_match('/what is a position/i', $message)) {
                $botman->reply('A position is the job a employee has related to their activities.');
            } elseif (preg_match('/what are contracts/i', $message)) {
                $botman->reply('4 types: Unionized event, Unionized base, Trust event, and Trust base.');
            } elseif (preg_match('/change employee contract/iu', $message)) {
                $botman->reply('');
            }elseif (preg_match('/what is a zone/iu', $message)) {
                $botman->reply('Zones are areas where a service is offered and there is an office to attend to it.');
            } elseif (preg_match('/what are roles/iu', $message)) {
                $botman->reply('The current roles managed by the system are: Immediate leadership, Process zone leadership, Work process zone leadership, Zone superintendent, Work sub-manager, and Divisional manager.');
            } elseif (preg_match('/what is RPE/iu', $message)) {
                $botman->reply('The RPE is the unique employee identifier used in the company\'s systems.');
            } elseif (preg_match('/no RPE exists/iu', $message)) {
                $botman->reply('If you search for an employee and cannot find them by RPE, we suggest you check if the search was done correctly, and if so, report the lack of the same to your superior.');
            } elseif (preg_match('/what is the "view profile" button for/iu', $message)) {
                $botman->reply('It is used to view employee data, as well as access the menu where documents about the employee can be created.');
            } elseif (preg_match('/I can\'t find an option/iu', $message)) {
                $botman->reply('If you can\'t find an option, ask me which option you are looking for. If my answer doesn\'t help you, you probably don\'t have the necessary permissions to access that option.');
            }elseif (preg_match('/upload a document/i', $message)) {
                $botman->reply('To upload a document for an employee, you need to go to the employee\'s profile and then enter the documents section and the sub-section to upload a document.');
            } elseif (preg_match('/found an error/i', $message)) {
                $botman->reply('If you have found an error in the program, please contact the system administrator and report it for prompt resolution.');
            } elseif (preg_match('/contact the administrator/i', $message)) {
                $botman->reply('To contact the administrator, you can send an email to jesus.quintero7478@alumnos.udg.mx');
            } elseif (preg_match('/who is the administrator/i', $message)) {
                $botman->reply('The system has 2 administrators, Jesus Eduardo Quintero Gomez and David Guadalupe Vargas Lopez.');
            } elseif (preg_match('/who are the administrators/i', $message)) {
                $botman->reply('Our working hours are Monday to Friday from 9:00 am to 5:00 pm.');
            } elseif (preg_match('/how do I view notifications/i', $message)) {
                $botman->reply('To view notifications, you need to access their respective area. To do this, click on the bell icon in the top right corner of the screen.');
            } elseif (preg_match('/I don\'t have any notifications/i', $message)) {
                $botman->reply('If you don\'t have any notifications, it may be because you don\'t have any pending documents.');
            } elseif (preg_match('/like tacos/i', $message)) {
                $botman->reply('I love tacos, but I can\'t eat them as I am stuck in this computer to help you.');
            } elseif (preg_match('/view the documents/i', $message)) {
                $botman->reply('To view an employee\'s documents, you just need to access their profile and click on the download button for the document you want to view. After downloading, you just need to open it on your computer.');
            } elseif (preg_match('/my area is not listed/i', $message)) {
                $botman->reply('If you don\'t find your area listed in the options, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/I can\'t find my area/i', $message)) {
                $botman->reply('If you don\'t find your area listed in the options, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/my area doesn\'t exist/i', $message)) {
                $botman->reply('If you don\'t find your area listed in the options, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/an employee is not listed/i', $message)) {
                $botman->reply('If you don\'t find an employee in the system, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/I can\'t find an employee/i', $message)) {
                $botman->reply('If you don\'t find an employee in the system, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/an employee is not registered/i', $message)) {
                $botman->reply('If you don\'t find an employee in the system, we recommend reporting it to your supervisor to be added as soon as possible.');
            } elseif (preg_match('/an employee doesn\'t exist/i', $message)) {
                $botman->reply('If you don\'t find an employee in the system, we recommend reporting it to your supervisor to be added as soon as possible.');
            } 
            
            
            
            
            elseif (preg_match('/phone number of/i', $message)) {
                $botman->reply('If you want to contact someone, you can check the program\'s directory. Important personnel contacts are stored there.');
            } elseif (preg_match('/contact/i', $message)) {
                $botman->reply('If you want to contact someone, you can check the program\'s directory. Important personnel contacts are stored there.');
            }elseif (preg_match('/how do I report a problem/i', $message)) {
                $botman->reply('To report a system problem, you must send an email to the administrator or your boss explaining it in detail.');
            } elseif (preg_match('/report a problem/i', $message)) {
                $botman->reply('To report a system problem, you must send an email to the administrator or your boss explaining it in detail.');
            } elseif (preg_match('/disciplinary action/i', $message)) {
                $botman->reply('To issue a disciplinary action, you need to access the profile of the target employee. If the corresponding document is a disciplinary action, it will allow you to fill out a form to generate it. You can also choose to upload it directly to the system.');
            } elseif (preg_match('/accountability/i', $message)) {
                $botman->reply('To create an accountability report, you need to access the profile of the target employee. If the corresponding document is an accountability report, it will allow you to fill out a form to generate it. You can also choose to upload it directly to the system.');
            } elseif (preg_match('/administrative record/i', $message)) {
                $botman->reply('To create an administrative record, you need to access the profile of the target employee. If the corresponding document is an administrative record, you can directly upload the document to the system.');
            } elseif (preg_match('/change password/i', $message)) {
                $botman->reply('If you want to change your password, you need to access your profile and modify it from there.');
            } elseif (preg_match('/access my profile/i', $message)) {
                $botman->reply('To access your profile, hover over your profile name, and a button will automatically appear. Click there to access your profile.');
            } elseif (preg_match('/accessing my profile/i', $message)) {
                $botman->reply('To access your profile, hover over your profile name, and a button will automatically appear. Click there to access your profile.');
            } elseif (preg_match('/not loading/i', $message)) {
                $botman->reply('If the system is not loading, check your internet connection. If the internet is working fine, please report the problem to the administrator.');
            } elseif (preg_match('/error 505/i', $message)) {
                $botman->reply('If you encounter a 505 error, send an email to the administrator stating the error and which page displayed it. The error will be resolved promptly.');
            } elseif (preg_match('/error 504/i', $message)) {
                $botman->reply('If you encounter a 504 error, send an email to the administrator stating the error and which page displayed it. The error will be resolved promptly.');
            } elseif (preg_match('/administrator\'s email/i', $message)) {
                $botman->reply('To contact the administrator, you can send an email to jesus.quintero7478@alumnos.udg.mx');
            } elseif (preg_match('/does God exist?/i', $message)) {
                $botman->reply('I don\'t know, I hope I have helped you.');
            } elseif (preg_match('/working hours/i', $message)) {
                $botman->reply('The maximum daily working hours according to the Federal Labor Law is 8 hours.');
            } elseif (preg_match('/rights do I have/i', $message)) {
                $botman->reply('As a worker, you have the right to receive a fair and just minimum wage that allows you to cover your basic needs and those of your family.');
            } elseif (preg_match('/maximum weekly working hours/i', $message)) {
                $botman->reply('The maximum weekly working hours are 48 hours.');
            } elseif (preg_match('/rest period/i', $message)) {
                $botman->reply('After 6 hours of continuous work, you are entitled to a rest period of at least 30 minutes.');
            } elseif (preg_match('/maximum overtime/i', $message)) {
                $botman->reply('The maximum overtime allowed per day is 3 hours, and per week is 9 hours.');
            } elseif (preg_match('/vacation rights/i', $message)) {
                $botman->reply('You have the right to annual paid vacation time, which varies depending on your length of employment, but is generally at least 6 business days.');
            } elseif (preg_match('/resign/i', $message)) {
                $botman->reply('If you want to resign, you must notify your employer in writing with at least 15 days\' notice of your decision to resign.');
            } elseif (preg_match('/types of contracts/i', $message)) {
                $botman->reply('The Federal Labor Law recognizes indefinite contracts, fixed-term contracts, contracts for specific work or services, and seasonal contracts.');
            } elseif (preg_match('/rights in case of unfair dismissal/i', $message)) {
                $botman->reply('You have the right to receive compensation and to demand reinstatement to your job.');
            } elseif (preg_match('/(obligations|employer)/i', $message)) {
                $botman->reply('The employer is obligated to provide a safe and healthy work environment, as well as to comply with safety and hygiene labor regulations.');
            } elseif (preg_match('/labor rights/i', $message)) {
                $botman->reply('Your labor rights are protected by the Federal Labor Law.');
            }elseif (preg_match('/work disability/i', $message)) {
                $botman->reply('To request a work disability, you need a medical certificate and to communicate it to human resources.');
            } elseif (preg_match('/vacations/i', $message)) {
                $botman->reply('To request vacations, you must submit a written request to your supervisor.');
            } elseif (preg_match('/workplace harassment/i', $message)) {
                $botman->reply('If you experience workplace harassment, immediately report it to your supervisor or human resources.');
            }




             
            elseif (preg_match('/unfair dismissal/i', $message)) {
                $botman->reply('You are protected against unfair dismissal by the Federal Labor Law.');
            } elseif (preg_match('/work schedules/i', $message)) {
                $botman->reply('Work schedules are regulated by the company and may vary depending on the department.');
            } elseif (preg_match('/work permits/i', $message)) {
                $botman->reply('Work permits must be requested and approved by human resources or your supervisor.');
            } elseif (preg_match('/workplace safety/i', $message)) {
                $botman->reply('Workplace safety is a priority, and established regulations and procedures must be followed.');
            } elseif (preg_match('/salary payments/i', $message)) {
                $botman->reply('Salary payments are made according to company policies and the Federal Labor Law.');
            } elseif (preg_match('/labor benefits/i', $message)) {
                $botman->reply('Labor benefits include social security, year-end bonus, and vacations, among others.');
            } elseif (preg_match('/work hours record/i', $message)) {
                $botman->reply('It is important to record your work hours for compliance with regulations.');
            } elseif (preg_match('/voluntary resignation/i', $message)) {
                $botman->reply('If you wish to resign voluntarily, you must notify human resources in advance.');
            } elseif (preg_match('/occupational health/i', $message)) {
                $botman->reply('Occupational health is essential, and safety and prevention measures must be followed.');
            } elseif (preg_match('/training and development/i', $message)) {
                $botman->reply('The company may provide training and development opportunities for professional growth.');
            } elseif (preg_match('/economic compensation/i', $message)) {
                $botman->reply('Economic compensation may include base salary, bonuses, and additional benefits.');
            } elseif (preg_match('/internal work regulations/i', $message)) {
                $botman->reply('Internal work regulations establish the rules and policies of the company.');
            } elseif (preg_match('/occupational medical exams/i', $message)) {
                $botman->reply('Occupational medical exams may be required to ensure health and safety at work.');
            } elseif (preg_match('/retirement/i', $message)) {
                $botman->reply('The retirement process is subject to company provisions and current laws.');
            } elseif (preg_match('/maternity\/paternity/i', $message)) {
                $botman->reply('Maternity/paternity rights are protected by law, and the company may offer additional benefits.');
            } elseif (preg_match('/work-related accident compensation/i', $message)) {
                $botman->reply('Work-related accident compensation may include medical care and financial compensation.');
            } elseif (preg_match('/confidentiality of information/i', $message)) {
                $botman->reply('Confidentiality of information is fundamental, and you must respect it at all times.');
            } elseif (preg_match('/code of ethics/i', $message)) {
                $botman->reply('The code of ethics establishes the principles and values that employees of the company must follow.');
            } elseif (preg_match('/internal vacancies/i', $message)) {
                $botman->reply('Internal vacancies may be posted for employees to apply.');
            } elseif (preg_match('/performance evaluation/i', $message)) {
                $botman->reply('Performance evaluations may be conducted periodically to assess work performance.');
            } elseif (preg_match('/compensation for overtime/i', $message)) {
                $botman->reply('Overtime compensation may be provided according to company policies and the law.');
            } elseif (preg_match('/workplace wellness program/i', $message)) {
                $botman->reply('The workplace wellness program may include activities and benefits to promote employee health and well-being.');
            }elseif (preg_match('/work-life balance/i', $message)) {
                $botman->reply('Work-life balance is important, and the company may offer measures to facilitate it.');
            } elseif (preg_match('/attendance record/i', $message)) {
                $botman->reply('It is important to record your attendance according to the schedules established by the company.');
            } elseif (preg_match('/disciplinary procedure/i', $message)) {
                $botman->reply('The disciplinary procedure may be applied in case of non-compliance with rules and policies.');
            }




               
            elseif (preg_match('/life insurance/i', $message)) {
                $botman->reply('The company may offer life insurance as part of the employment benefits.');
            } elseif (preg_match('/right to unionize/i', $message)) {
                $botman->reply('Employees have the right to unionize, and the company must respect this right.');
            } elseif (preg_match('/sick leave/i', $message)) {
                $botman->reply('You can request sick leave by presenting a medical certificate.');
            } elseif (preg_match('/personal data protection/i', $message)) {
                $botman->reply('The company must protect your personal data according to data protection laws.');
            } elseif (preg_match('/longevity awards/i', $message)) {
                $botman->reply('You may receive longevity awards according to company policies.');
            } elseif (preg_match('/prohibition of discrimination/i', $message)) {
                $botman->reply('Discrimination is prohibited by law, and the company must promote equal opportunities.');
            } elseif (preg_match('/major medical expenses insurance policy/i', $message)) {
                $botman->reply('The company may offer a major medical expenses insurance policy as an additional benefit.');
            } elseif (preg_match('/early vacation/i', $message)) {
                $botman->reply('You can request early vacation with the approval of your supervisor and human resources.');
            } elseif (preg_match('/minimum wage/i', $message)) {
                $botman->reply('Your salary must comply with the minimum wage established by law.');
            } elseif (preg_match('/expense reimbursement/i', $message)) {
                $botman->reply('You can request reimbursement of authorized expenses according to company policies.');
            } elseif (preg_match('/pension plan/i', $message)) {
                $botman->reply('The company may offer a pension plan as an additional benefit for your retirement.');
            } elseif (preg_match('/right to strike/i', $message)) {
                $botman->reply('Workers have the right to strike in case of labor disputes.');
            } elseif (preg_match('/employment contract/i', $message)) {
                $botman->reply('The employment contract establishes the terms and conditions of your employment.');
            } elseif (preg_match('/anonymous complaint/i', $message)) {
                $botman->reply('You can make an anonymous complaint in case of irregularities or misconduct.');
            } elseif (preg_match('/meal breaks/i', $message)) {
                $botman->reply('Meal breaks are regulated by law, and the company must provide a minimum time.');
            } elseif (preg_match('/maternity protection/i', $message)) {
                $botman->reply('Maternity protection is guaranteed by law, and the company must respect these rights.');
            } elseif (preg_match('/compensation for work on holidays/i', $message)) {
                $botman->reply('Work on holidays may be compensated with additional pay or time off.');
            }elseif (preg_match('/unemployment insurance/i', $message)) {
                $botman->reply('You may be entitled to unemployment insurance if you lose your job.');
            } elseif (preg_match('/paternity leave/i', $message)) {
                $botman->reply('Fathers have the right to paternity leave after the birth of a child.');
            } elseif (preg_match('/retirement requirements/i', $message)) {
                $botman->reply('Retirement requirements may vary according to the law and company programs.');
            } elseif (preg_match('/occupational safety training/i', $message)) {
                $botman->reply('Occupational safety training is mandatory and may include courses and practical exercises.');
            } elseif (preg_match('/pension rights/i', $message)) {
                $botman->reply('You have the right to a pension based on contributions made during your working life.');
            } elseif (preg_match('/productivity incentives/i', $message)) {
                $botman->reply('You may receive productivity incentives based on your work performance.');
            } elseif (preg_match('/medical expenses reimbursement/i', $message)) {
                $botman->reply('You can request reimbursement of authorized medical expenses according to company policies.');
            } elseif (preg_match('/bereavement leave/i', $message)) {
                $botman->reply('You can request bereavement leave in case of the death of a close family member.');
            }
            
            
            
            
            elseif (preg_match('/gender equality policy/i', $message)) {
                $botman->reply('The company may have a gender equality policy to promote equality in the workplace.');
            } elseif (preg_match('/procedure for reporting irregularities/i', $message)) {
                $botman->reply('You can follow a specific procedure to report irregularities confidentially.');
            } elseif (preg_match('/union rights/i', $message)) {
                $botman->reply('You have the right to join a union and participate in union activities.');
            } elseif (preg_match('/protection against sexual harassment/i', $message)) {
                $botman->reply('The company must provide a safe working environment and protect against sexual harassment.');
            } elseif (preg_match('/workplace safety/i', $message)) {
                $botman->reply('Workplace safety is everyone\'s responsibility, and you must follow rules and procedures.');
            } elseif (preg_match('/diversity and inclusion policy/i', $message)) {
                $botman->reply('The company may have a diversity and inclusion policy to promote equal opportunities.');
            } elseif (preg_match('/productivity incentives/i', $message)) {
                $botman->reply('You may receive productivity incentives based on your work performance.');
            } elseif (preg_match('/what is an indicator/i', $message)) {
                $botman->reply('An indicator is one of the requirements that must be met in a task.');
            } elseif (preg_match('/how do I add an indicator/i', $message)) {
                $botman->reply('To add an indicator, you need to have the necessary permissions. If you have them, just go to the indicators section and add it.');
            } elseif (preg_match('/how do I view my salary/i', $message)) {
                $botman->reply('You can check your contract, your paycheck, or ask your supervisor.');
            } elseif (preg_match('/a document did not reach me/i', $message)) {
                $botman->reply('If a document generated by someone else did not reach you, ask them to make sure they sent it to the correct person. If they did, report the problem to the system administrator and provide the document information.');
            } elseif (preg_match('/order of documents/i', $message)) {
                $botman->reply('Documents are generated in the following order: 2 renditions of accounts, 1 warning, and 1 administrative act.');
            } elseif (preg_match('/what is a warning/i', $message)) {
                $botman->reply('A warning is a document generated when an employee fails to meet their indicators in 3 or more tasks.');
            } elseif (preg_match('/what is an account rendition/i', $message)) {
                $botman->reply('An account rendition is a document generated when an employee fails to meet an indicator in a task.');
            } elseif (preg_match('/what is an administrative act/i', $message)) {
                $botman->reply('An administrative act is a document generated when an employee fails to meet an indicator in 4 or more tasks.');
            } elseif (preg_match('/what is a position/i', $message)) {
                $botman->reply('A position is the job that an employee has related to their activities.');
            }elseif (preg_match('/what is a position for/i', $message)) {
                $botman->reply('To know the employee\'s position and related activities.');
            } elseif (preg_match('/what are positions used for/i', $message)) {
                $botman->reply('To know the employee\'s position and related activities.');
            } elseif (preg_match('/why does it ask me for the position/i', $message)) {
                $botman->reply('To know the employee\'s position and related activities.');
            } elseif (preg_match('/what types of contracts are there/i', $message)) {
                $botman->reply('4 types: Unionized Eventual, Unionized Base, Confidence Eventual, and Confidence Base.');
            } elseif (preg_match('/what is a zone/iu', $message)) {
                $botman->reply('Zones are areas where a service is offered and there is a headquarters to attend it.');
            } elseif (preg_match('/what is a zone used for/iu', $message)) {
                $botman->reply('Zones are used to identify the area to which an employee belongs.');
            } elseif (preg_match('/view zones/iu', $message)) {
                $botman->reply('To view the registered zones in the system, you need to go to the zones menu and select the list of zones. If this menu does not appear, it indicates that you do not have sufficient permissions to access it.');
            } elseif (preg_match('/what are roles/iu', $message)) {
                $botman->reply('Roles are the positions held by system users. These determine the permissions of the respective user in the system.');
            } elseif (preg_match('/what are the current roles/iu', $message)) {
                $botman->reply('The current roles managed by the system are: Immediate Management, Process Zonal Management, Work Process Zonal Management, Zone Superintendent, Work Submanager, and Divisional Manager.');
            }




            elseif (preg_match('/what are roles used for/iu', $message)) {
                $botman->reply('Roles are used to identify the position of the respective user and their permissions in the system.');
            } elseif (preg_match('/view roles/iu', $message)) {
                $botman->reply('To view the roles in the system, just go to the roles section in the Others menu. If this menu does not appear, it indicates that you do not have sufficient permissions to access it.');
            } elseif (preg_match('/what is RPE/iu', $message)) {
                $botman->reply('RPE is the unique employee identifier used in the company\'s systems.');
            } elseif (preg_match('/what is RPE/iu', $message)) {
                $botman->reply('RPE is the unique employee identifier used in the company\'s systems.');
            } elseif (preg_match('/RPE does not exist/iu', $message)) {
                $botman->reply('If you search for an employee and cannot find them by RPE, we suggest you check if the search was done correctly, and if so, report the absence to your superior.');
            } elseif (preg_match('/no RPE found/iu', $message)) {
                $botman->reply('If you search for an employee and cannot find them by RPE, we suggest you check if the search was done correctly, and if so, report the absence to your superior.');
            }elseif (preg_match('/non-existent RPE/iu', $message)) {
                $botman->reply('If you search for an employee and cannot find them by RPE, we suggest you check if the search was done correctly, and if so, report the absence to your superior');
            } elseif (preg_match('/what is.*view profile/iu', $message)) {
                $botman->reply('It is used to view employee data, as well as to access the menu where documents about the employee can be created');
            } elseif (preg_match('/what does.*view profile/iu', $message)) {
                $botman->reply('It is used to view employee data, as well as to access the menu where documents about the employee can be created');
            } elseif (preg_match('/cannot find an option/iu', $message)) {
                $botman->reply('If you cannot find an option, ask me which option you are looking for. If my response does not help you, it is most likely because you do not have the necessary permissions to access that option');
            } elseif (preg_match('/cannot find a button/iu', $message)) {
                $botman->reply('If you cannot find an option, ask me which option you are looking for. If my response does not help you, it is most likely because you do not have the necessary permissions to access that option');
            } elseif (preg_match('/repeated RPE/iu', $message)) {
                $botman->reply('If you have found a repeated RPE, please report it to your superior or system administrator for prompt correction');
            } elseif (preg_match('/what is user list/iu', $message)) {
                $botman->reply('The user list is the menu where all registered users in the system can be viewed');
            } elseif (preg_match('/what is indicator list/iu', $message)) {
                $botman->reply('The indicator list is the menu where all registered indicators in the system can be viewed');
            } elseif (preg_match('/what is my list/iu', $message)) {
                $botman->reply('My list is the menu where all registered employees in the system can be viewed');
            } elseif (preg_match('/what is zone list/iu', $message)) {
                $botman->reply('The zone list is the menu where all registered zones in the system can be viewed');
            } elseif (preg_match('/where is user list/iu', $message)) {
                $botman->reply('The user list is located in the Users menu');
            } elseif (preg_match('/where is employee list/iu', $message)) {
                $botman->reply('The employee list is located in the Employees menu, in the My List area');
            } elseif (preg_match('/where is my list/iu', $message)) {
                $botman->reply('My list is located in the Employees menu');
            } elseif (preg_match('/where is indicator list/iu', $message)) {
                $botman->reply('The indicator list is located in the Indicators menu');
            } elseif (preg_match('/where is position list/iu', $message)) {
                $botman->reply('The position list is located in the Positions menu');
            } elseif (preg_match('/where is zone list/iu', $message)) {
                $botman->reply('The zone list is located in the Zones menu');
            } elseif (preg_match('/where to register users/iu', $message)) {
                $botman->reply('To register users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/how to register users/iu', $message)) {
                $botman->reply('To register users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/can I register users/iu', $message)) {
                $botman->reply('To register a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            }
            
            
            
            
            elseif (preg_match('/where to register.*user/iu', $message)) {
                $botman->reply('To register users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/how to register.*user/iu', $message)) {
                $botman->reply('To register users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/where to add.*user/iu', $message)) {
                $botman->reply('To add users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/how to add.*user/iu', $message)) {
                $botman->reply('To add users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/can I add.*user/iu', $message)) {
                $botman->reply('To add a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to create.*user/iu', $message)) {
                $botman->reply('To create users, go to the Users menu and select the Register User option, then complete the corresponding form');
            }elseif (preg_match('/how to create.*user/iu', $message)) {
                $botman->reply('To create users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/can I create.*user/iu', $message)) {
                $botman->reply('To create a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to add.*user/iu', $message)) {
                $botman->reply('To add users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/how to add.*user/iu', $message)) {
                $botman->reply('To add users, go to the Users menu and select the Register User option, then complete the corresponding form');
            } elseif (preg_match('/can I add.*user/iu', $message)) {
                $botman->reply('To add a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to register.*employee/iu', $message)) {
                $botman->reply('To register employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/how to register.*employee/iu', $message)) {
                $botman->reply('To register employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/can I register.*employee/iu', $message)) {
                $botman->reply('To register an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to add.*employee/iu', $message)) {
                $botman->reply('To add employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/how to add.*employee/iu', $message)) {
                $botman->reply('To add employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/can I add.*employee/iu', $message)) {
                $botman->reply('To add an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to create.*employee/iu', $message)) {
                $botman->reply('To create employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/how to create.*employee/iu', $message)) {
                $botman->reply('To create employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/can I create.*employee/iu', $message)) {
                $botman->reply('To create an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to add.*employee/iu', $message)) {
                $botman->reply('To add employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/how to add.*employee/iu', $message)) {
                $botman->reply('To add employees, go to the Employees menu and select the Add Employee option, then complete the corresponding form');
            } elseif (preg_match('/can I add.*employee/iu', $message)) {
                $botman->reply('To add an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/how to modify.*user/iu', $message)) {
                $botman->reply('To modify a user, you need to place the cursor over the username in the options menu, then 2 options will appear below. Open the view profile option and a view will open where you can modify the user data');
            } elseif (preg_match('/where to modify.*user/iu', $message)) {
                $botman->reply('To modify a user, you need to place the cursor over the username in the options menu, then 2 options will appear below. Open the view profile option and a view will open where you can modify the user data');
            }
            
            
            
            
            elseif (preg_match('/can I modify.*user/iu', $message)) {
                $botman->reply('To modify a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            }elseif (preg_match('/how to modify.*employee/iu', $message)) {
                $botman->reply('To modify an employee\'s data, simply go to your list, press the "view profile" button for the respective employee, and when the corresponding view opens, go to the last option to modify the employee\'s data');
            } elseif (preg_match('/where to modify.*employee/iu', $message)) {
                $botman->reply('To modify an employee\'s data, simply go to your list, press the "view profile" button for the respective employee, and when the corresponding view opens, go to the last option to modify the employee\'s data');
            } elseif (preg_match('/can I modify.*employee/iu', $message)) {
                $botman->reply('To modify an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/how to edit.*user/iu', $message)) {
                $botman->reply('To edit a user, you need to place the cursor over the username in the options menu. Then, 2 options will appear below. Open the view profile option, and a view will open where you can edit the user\'s data');
            } elseif (preg_match('/where to edit.*user/iu', $message)) {
                $botman->reply('To edit a user, you need to place the cursor over the username in the options menu. Then, 2 options will appear below. Open the view profile option, and a view will open where you can edit the user\'s data');
            } elseif (preg_match('/can I edit.*user/iu', $message)) {
                $botman->reply('To edit a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/how to edit.*employee/iu', $message)) {
                $botman->reply('To edit an employee\'s data, simply go to your list, press the "view profile" button for the respective employee, and when the corresponding view opens, go to the last option to edit the employee\'s data');
            } elseif (preg_match('/where to edit.*employee/iu', $message)) {
                $botman->reply('To edit an employee\'s data, simply go to your list, press the "view profile" button for the respective employee, and when the corresponding view opens, go to the last option to edit the employee\'s data');
            } elseif (preg_match('/can I edit.*employees/iu', $message)) {
                $botman->reply('To edit an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to delete.*user/iu', $message)) {
                $botman->reply('To delete a user, simply go to the list of users, find the user in question, and click on the respective delete user button');
            } elseif (preg_match('/how to delete.*user/iu', $message)) {
                $botman->reply('To delete a user, simply go to the list of users, find the user in question, and click on the respective delete user button');
            } elseif (preg_match('/can I delete.*user/iu', $message)) {
                $botman->reply('To delete a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to remove.*user/iu', $message)) {
                $botman->reply('To delete a user, simply go to the list of users, find the user in question, and click on the respective delete user button');
            } elseif (preg_match('/how to remove.*user/iu', $message)) {
                $botman->reply('To delete a user, simply go to the list of users, find the user in question, and click on the respective delete user button');
            } elseif (preg_match('/can I remove.*user/iu', $message)) {
                $botman->reply('To remove a user, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to delete.*employee/iu', $message)) {
                $botman->reply('To delete an employee, simply go to my list, find the employee in question, and click on the respective delete employee button');
            } elseif (preg_match('/how to delete.*employee/iu', $message)) {
                $botman->reply('To delete an employee, simply go to my list, find the employee in question, and click on the respective delete employee button');
            } elseif (preg_match('/can I delete.*employee/iu', $message)) {
                $botman->reply('To delete an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to remove.*employee/iu', $message)) {
                $botman->reply('To delete an employee, simply go to my list, find the employee in question, and click on the respective delete employee button');
            } elseif (preg_match('/how to remove.*employee/iu', $message)) {
                $botman->reply('To delete an employee, simply go to my list, find the employee in question, and click on the respective delete employee button');
            } elseif (preg_match('/can I remove.*employee/iu', $message)) {
                $botman->reply('To remove an employee, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            } elseif (preg_match('/where to create.*indicator/iu', $message)) {
                $botman->reply('To create the indicator, simply go to the Create Indicator section in the Indicators menu, fill out the form, and click Save');
            } elseif (preg_match('/how to create.*indicator/iu', $message)) {
                $botman->reply('To create the indicator, simply go to the Create Indicator section in the Indicators menu, fill out the form, and click Save');
            } elseif (preg_match('/can I create.*indicator/iu', $message)) {
                $botman->reply('To create an indicator, you need to have the necessary permissions. If the respective view does not appear, consult your superior about access to this function');
            }
            
            
            
            
            elseif (preg_match('/where to add.*indicator/iu', $message)) {
                $botman->reply('To add the indicator, simply go to the Create Indicator section in the Indicators menu, fill out the form, and click Save');
            } elseif (preg_match('/how to add.*indicator/iu', $message)) {
                $botman->reply('To add the indicator, simply go to the Create Indicator section in the Indicators menu, fill out the form, and click Save');
            } elseif (preg_match('/puedo añadir.*indicador/iu', $message)) {
                $botman->reply('Para añadir un indicador es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/donde registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo tienes que ir al apartado de crear indicador en el menú de indicadores, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar el indicador solo tienes que ir al apartado de crear indicador en el menú de indicadores, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/puedo registrar.*indicador/iu', $message)) {
                $botman->reply('Para registrar un indicador es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/donde agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo tienes que ir al apartado de crear indicador en el menú de indicadores, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como agregar.*indicador/iu', $message)) {
                $botman->reply('Para agregar el indicador solo tienes que ir al apartado de crear indicador en el menú de indicadores, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/donde registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/puedo registrar.*puesto/iu', $message)) {
                $botman->reply('Para registrar un puesto es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/donde añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/puedo añadir.*puesto/iu', $message)) {
                $botman->reply('Para añadir un puesto es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/donde agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/puedo agregar.*puesto/iu', $message)) {
                $botman->reply('Para agregar un puesto es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/donde crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/como crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto solo tienes que ir al apartado de añadir puestos en el menú de Puestos, llenar el formulario y hacer clic en guardar');
            } elseif (preg_match('/puedo crear.*puesto/iu', $message)) {
                $botman->reply('Para crear un puesto es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            } elseif (preg_match('/que es.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/que son.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto son las funciones que se asignan a determinados puestos dentro de la empresa');
            } elseif (preg_match('/sirven.*funciones de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones que debe cumplir el empleado con el puesto asignado');
            } elseif (preg_match('/sirve.*funcion de puesto/iu', $message)) {
                $botman->reply('Las funciones de puesto sirven para listar las respectivas funciones que debe cumplir el empleado con el puesto asignado');
            } elseif (preg_match('/donde agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo tienes que ir al apartado de listado de zonas en el menú de Zonas, llenar los datos de la nueva zona en la parte superior y hacer clic en el botón agregar zona');
            }
            
            
            
            
            elseif (preg_match('/como agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona solo tienes que ir al apartado de listado de zonas en el menú de Zonas, llenar los datos de la nueva zona en la parte superior y hacer clic en el botón agregar zona');
            } elseif (preg_match('/puedo agregar.*zona/iu', $message)) {
                $botman->reply('Para agregar una zona es necesario tener los permisos necesarios. Si no aparece la vista respectiva, consulta con tu superior el acceso a esta función');
            }elseif (preg_match('/where to create.*zone/iu', $message)) {
                $botman->reply('To create a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/how to create.*zone/iu', $message)) {
                $botman->reply('To create a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/can I create.*zone/iu', $message)) {
                $botman->reply('To create a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to add.*zone/iu', $message)) {
                $botman->reply('To add a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/how to add.*zone/iu', $message)) {
                $botman->reply('To add a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/can I add.*zone/iu', $message)) {
                $botman->reply('To add a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to register.*zone/iu', $message)) {
                $botman->reply('To register a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/how to register.*zone/iu', $message)) {
                $botman->reply('To register a zone, you just need to go to the zone listing section in the Zones menu, fill in the details of the new zone at the top, and click the add zone button.');
            } elseif (preg_match('/can I register.*zone/iu', $message)) {
                $botman->reply('To register a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to modify.*zone/iu', $message)) {
                $botman->reply('To modify a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective modify button. Then fill out the form with the new data and save.');
            } elseif (preg_match('/how to modify.*zone/iu', $message)) {
                $botman->reply('To modify a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective modify button. Then fill out the form with the new data and save.');
            } elseif (preg_match('/can I modify.*zone/iu', $message)) {
                $botman->reply('To modify a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to edit.*zone/iu', $message)) {
                $botman->reply('To edit a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective modify button. Then fill out the form with the new data and save.');
            } elseif (preg_match('/how to edit.*zone/iu', $message)) {
                $botman->reply('To edit a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective modify button. Then fill out the form with the new data and save.');
            } elseif (preg_match('/can I edit.*zone/iu', $message)) {
                $botman->reply('To edit a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to delete.*zone/iu', $message)) {
                $botman->reply('To delete a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective delete button.');
            } elseif (preg_match('/how to delete.*zone/iu', $message)) {
                $botman->reply('To delete a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective delete button.');
            } elseif (preg_match('/can I delete.*zone/iu', $message)) {
                $botman->reply('To delete a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective delete button.');
            } elseif (preg_match('/where to remove.*zone/iu', $message)) {
                $botman->reply('To remove a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective delete button.');
            } elseif (preg_match('/how to remove.*zone/iu', $message)) {
                $botman->reply('To remove a zone, you just need to go to the zone listing section in the Zones menu, find the respective zone in the list, and click the respective delete button.');
            } elseif (preg_match('/can I remove.*zone/iu', $message)) {
                $botman->reply('To remove a zone, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to register.*contract/iu', $message)) {
                $botman->reply('To register a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/how to register.*contract/iu', $message)) {
                $botman->reply('To register a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            }
            
            
            
            
            elseif (preg_match('/can I register.*contract/iu', $message)) {
                $botman->reply('To register a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/how to add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/can I add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            }elseif (preg_match('/how to add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/can I add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/how to add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/can I add.*contract/iu', $message)) {
                $botman->reply('To add a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to create.*contract/iu', $message)) {
                $botman->reply('To create a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/how to create.*contract/iu', $message)) {
                $botman->reply('To create a contract, you just need to go to the contracts section in the Others menu, write the name of the new contract at the top, and click the Add contract button.');
            } elseif (preg_match('/can I create.*contract/iu', $message)) {
                $botman->reply('To create a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to modify.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be modified once created.');
            } elseif (preg_match('/how to modify.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be modified once created.');
            } elseif (preg_match('/can I modify.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be modified once created.');
            } elseif (preg_match('/where to edit.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be edited once created.');
            } elseif (preg_match('/how to edit.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be edited once created.');
            } elseif (preg_match('/can I edit.*contract/iu', $message)) {
                $botman->reply('Contracts cannot be edited once created.');
            } elseif (preg_match('/where to delete.*contract/iu', $message)) {
                $botman->reply('To delete a contract, you just need to go to the contracts section in the Others menu and click the delete button on the respective contract.');
            } elseif (preg_match('/how to delete.*contract/iu', $message)) {
                $botman->reply('To delete a contract, you just need to go to the contracts section in the Others menu and click the delete button on the respective contract.');
            } elseif (preg_match('/can I delete.*contract/iu', $message)) {
                $botman->reply('To delete a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to remove.*contract/iu', $message)) {
                $botman->reply('To remove a contract, you just need to go to the contracts section in the Others menu and click the delete button on the respective contract.');
            } elseif (preg_match('/how to remove.*contract/iu', $message)) {
                $botman->reply('To remove a contract, you just need to go to the contracts section in the Others menu and click the delete button on the respective contract.');
            } elseif (preg_match('/can I remove.*contract/iu', $message)) {
                $botman->reply('To remove a contract, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to register.*role/iu', $message)) {
                $botman->reply('To register a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            }
            
            
            
            
            elseif (preg_match('/how to register.*role/iu', $message)) {
                $botman->reply('To register a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/can I register.*role/iu', $message)) {
                $botman->reply('To register a role, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to add.*role/iu', $message)) {
                $botman->reply('To add a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/how to add.*role/iu', $message)) {
                $botman->reply('To add a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/can I add.*role/iu', $message)) {
                $botman->reply('To add a role, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            }elseif (preg_match('/where to add.*role/iu', $message)) {
                $botman->reply('To add a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/how to add.*role/iu', $message)) {
                $botman->reply('To add a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/can I add.*role/iu', $message)) {
                $botman->reply('To add a role, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to create.*role/iu', $message)) {
                $botman->reply('To create a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/how to create.*role/iu', $message)) {
                $botman->reply('To create a role, you just need to go to the role section in the Others menu, write the name, and click add role.');
            } elseif (preg_match('/can I create.*role/iu', $message)) {
                $botman->reply('To create a role, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to modify.*role/iu', $message)) {
                $botman->reply('Roles cannot be modified once created.');
            } elseif (preg_match('/how to modify.*role/iu', $message)) {
                $botman->reply('Roles cannot be modified once created.');
            } elseif (preg_match('/can I modify.*role/iu', $message)) {
                $botman->reply('Roles cannot be modified once created.');
            } elseif (preg_match('/where to edit.*role/iu', $message)) {
                $botman->reply('Roles cannot be edited once created.');
            } elseif (preg_match('/how to edit.*role/iu', $message)) {
                $botman->reply('Roles cannot be edited once created.');
            } elseif (preg_match('/can I edit.*role/iu', $message)) {
                $botman->reply('Roles cannot be edited once created.');
            } elseif (preg_match('/where to delete.*role/iu', $message)) {
                $botman->reply('To delete a role, you just need to go to the roles section in the Others menu and click the delete button on the respective role.');
            } elseif (preg_match('/how to delete.*role/iu', $message)) {
                $botman->reply('To delete a role, you just need to go to the roles section in the Others menu and click the delete button on the respective role.');
            } elseif (preg_match('/can I delete.*role/iu', $message)) {
                $botman->reply('To delete a role, you need to have the necessary permissions. If the respective view does not appear, consult with your superior for access to this function.');
            } elseif (preg_match('/where to remove.*role/iu', $message)) {
                $botman->reply('To remove a role, you just need to go to the roles section in the Others menu and click the delete button on the respective role.');
            } elseif (preg_match('/how to remove.*role/iu', $message)) {
                $botman->reply('To remove a role, you just need to go to the roles section in the Others menu and click the delete button on the respective role.');
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
