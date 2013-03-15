<?php

$plugin_info = array(
    'pi_name'           => 'Is Entry',
    'pi_version'        => '0.1.2',
    'pi_author'         => 'James McFall',
    'pi_author_url'     => 'http://mcfall.geek.nz/',
    'pi_description'    => 'A simple plugin allowing you to test whether a given
                            URL title or entry id exists as a channel entry.',
    'pi_usage'          => null
);

class Is_entry {

    public $return_data = "";
    
    /**
     * Constructor
     * 
     * The "check" parameter must be supplied. It'll work if a URL title or 
     * entry id is supplied.
     */
    function __construct() {
        
        $this->EE = & get_instance();

        # The string to check (if it's a channel entry ID or url_title)
        $to_check = $this->EE->TMPL->fetch_param('check');
        
        # Check if the supplied string is an entry ID or url title
        $this->EE->db->select("*")
                     ->from("exp_channel_titles")
                     ->where("entry_id", $to_check)
                     ->or_where("url_title", $to_check);
        $result = $this->EE->db->get();
        
        /**
         * Please note that EE doesn't appear to be able to handle booleans 
         * (specifically false) in it's template tags so for the meantime I'm 
         * having to use strings. I will contact Ellislab and find a better
         * solutions
         */
        if ($result->num_rows()) {
            $this->return_data = "TRUE";
        } else {
            $this->return_data = "FALSE";
        }
    }
}

?>
