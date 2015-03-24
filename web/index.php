<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();


$app->get('/', function() {
    return 'Buildmgr Todo Manager:<br /><br />
<br />
Task code:
<br />
<br />
<xmp><target name="backup" depends="copyfiles, gzipjs, minifycss">
    <ftpupload host="localhost" username="user" password="pass" cleanDir="true" targetDir="/web/">
        <fileset dir="/web/bak/">
        </fileset>
    </ftpupload>
</target></xmp>
<br /><br />
Command code:<br /><br />

$ sudo phing backup
<br /><br /><br />
';
});


$app->get(
    '/build',
    function () use ($app) {
        $data = array();

        return new Response($app['twig']->render(
                'todo.xml.twig',
                array('data' => $data)
            ),
            200,
            array('Content-Type' => 'application/xml')
        );
    }
);

$app->run();
?>
