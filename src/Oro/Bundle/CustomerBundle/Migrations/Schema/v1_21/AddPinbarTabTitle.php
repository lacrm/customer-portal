<?php

namespace Oro\Bundle\CustomerBundle\Migrations\Schema\v1_21;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\OrderedMigrationInterface;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class AddPinbarTabTitle implements Migration, OrderedMigrationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $table = $schema->getTable('oro_cus_nav_item_pinbar');

        $table->addColumn('title', 'string', ['length' => 255, 'notnull' => false]);
        $table->addColumn('title_short', 'string', ['length' => 255, 'notnull' => false]);

        $queries->addPostQuery("UPDATE oro_cus_nav_item_pinbar SET title = '', title_short = ''");
    }
}
