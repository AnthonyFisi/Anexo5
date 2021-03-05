# Diseño de alto Nivel
Jhon Anthony Curi Saravia - 04 de Marzo del 2021

- [Definicion y Acronimos](#deficion_acronimos)
- [Versiones](#versiones)
- [Resumen](#resumen)
- [Objetivos](#objetivos)
    * [Stakeholders](#stakeholders)
- [Supocisiones](#suposiciones)
- [Limitaciones](#limitaciones)
- [Fuera de alcance](#fuera_alcance)
- [Propuesta](#propuesta)
    * [Arquitectura](#arquitectura)
        * [Fase 1 : descripcion](#descripcion)
        * [Fase 2 : Siguientes pasos](#siguientes_pasos)
        * [Descripcion del Diagrama de arquitectura](#descipcion_arquitectura)
        * [ Diagrama de arquitectura](#diagrama_arquitectura)
        * [Componentes externos](#componentes_externos)
        * [Componentes externos](#componentes_externos)
        * [Componentes internos](#componetes_internos)
        * [Diagrama de Secuencia](#diagrama_secuencia)
- [Base de datos](#base_datos)


<a name="deficion_acronimos"></a> 
## Definicion y Acronimos

* Mysql : Base de datos relacional
* Php : Hypertext Preprocessor
* Apache : Servidor HTTP open source
* Html : Lenguaje de marcas de hipertexto
* JQuery : Biblioteca multiplataforma de Javascript
* Ajax : Asynchronous JavaScript And XML
* Css : Hoja de estilos en cascada

<a name="versiones"></a> 
## Versiones
* revision 1:
    * Sin ningun comentario por el momento

<a name="resumen"></a> 
## Resumen

Este proyecto tiene como proposito facilitar de forma digital el envio del documento Anexo 5 hacia el trabajador que recibio una capacitacion y el supervisor quien dicto tal capacitacion con el objetivo de que las dos personas logren firmar tal documento y sean guardados en formato pdf como evidencia.

<a name="objetivos"></a> 
## Objetivos
* Proveer de dos sistemas con no mas de dos funcionalidades cada uno.
* Digitalizar el proceso de firma del documento Anexo 5.
* Contar con un repositorio de evidencias de las capacitaciones que reciben los trabajadores.
* Crear dos sitemas intuitivos hacia el usuario final.

<a name="stakeholders"></a> 
### Stakeholders

* RR.HH : tienen la responsabilidad de asignar el documento de "Anexo 5" al supervisor.
* Trabajador : tiene la responsibilidad de firmar el documento aceptando haber recibido la capacitacion.
* Supervisor : Recibe todos los documento de "Anexo 5" para ser firmados.

<a name="suposiciones"></a> 
## Suposiciones

* Estamos analizando este sistema en alto nivel sin muchos detalles tecnicos acerca de como funcionara todo por detras en bambalinas.
* Usaremos una BD de RRHH "Aquarius" y tambien una BD "Anexo5"
