<?php
use Migrations\AbstractSeed;

/**
 * ResponseOptions seed.
 */
class ResponseOptionsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [ 'name'    => 'Yes',
                      'label'    => 'Yes',
                      'status' =>1,
                      'response_group_id'=>1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'No',
                      'label'    => 'No',
                      'status' =>1,
                      'response_group_id'=>1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
        ];

        $table = $this->table('response_options');
        $table->insert($data)->save();
    }
}
