<?php


namespace App\Doctrine;


use Doctrine\DBAL\Schema\PostgreSqlSchemaManager;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;

class FixListener
{
    public function postGenerateSchema(GenerateSchemaEventArgs $eventArgs): void
    {
        $schemaManager = $eventArgs->getEntityManager()->getConnection()->getSchemaManager();
        if ($schemaManager instanceof PostgreSqlSchemaManager) {
            foreach ($schemaManager->getExistingSchemaSearchPaths() as $path) {
                if (!$eventArgs->getSchema()->hasNamespace($path)) {
                    $eventArgs->getSchema()->createNamespace($path);
                }
            }
        }
    }
}
