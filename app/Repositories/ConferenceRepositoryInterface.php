<?php
namespace App\Repositories;

interface ConferenceRepositoryInterface extends RepositoryBaseInterface
{
    public function getByName($name);
    public function getByVenue($id);
    public function getUpcomming($id);
}