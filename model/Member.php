<?php
require_once ('config.php');
class Member
{
    // put properties here

    /*
    If the pseudo is not null, get the data from database and fill the properties
    If the pseudo is null, do nothing
    */
    
    public function __construct($pseudo = NULL) {
        // SELECT
    }
    
    /*
    Save the member into the database. If the id property is null, create a new member
    If not, just update it
    */
    public function save()
    {
        //UPDATE & INSERT
    }
    
    /* is the current member admin ? */
    public function isAdmin()
    {
            // SELECT
    }
    
    
}
