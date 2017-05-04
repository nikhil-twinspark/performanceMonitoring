<?php
use Migrations\AbstractSeed;

/**
 * JobDesignations seed.
 */
class JobDesignationsSeed extends AbstractSeed
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
                    [ 'name'    => 'developer',
                      'label'   =>'Developer',
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'tester',
                      'label'   =>'Tester',
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'analyst',
                      'label'   =>'Analyst',
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),]
            ];;

        $table = $this->table('job_designations');
        $table->insert($data)->save();
    }
}
