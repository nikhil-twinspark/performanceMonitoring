<?php
use Migrations\AbstractMigration;

class AddEndTimeToEmployeeSurveys extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('employee_surveys');
        $table->addColumn('end_time', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
