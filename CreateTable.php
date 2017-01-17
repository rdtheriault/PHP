        <?php
        
        include('dbConnect.php');
 
        
        $sql = 'SELECT full_name, ee, new_ee,milestone_date, transfers_transfer_date, transfers_transfer_status,lastmodifieddate, ID  FROM reportemployeetransfers ORDER BY ee';

        $result = mysql_query($sql);
        
        $y = mysql_num_rows($result);//get the count of rows in the sql results
        
        ///echo $y." ";///for testing

         //array for results
        $data = array("id"=>array(),"ee"=>array(),"full_name"=>array(),"transfers_transfer_date"=>array(),"transfers_transfer_status"=>array());
        $firstcount = 0;
        
        //transfer results to array to gain indexing
        while($row = mysql_fetch_array($result))
        {
            $data["id"][$firstcount] = $row["ID"];
            $data["ee"][$firstcount] = $row["ee"];
            $data["full_name"][$firstcount] = $row["full_name"];
            $data["transfers_transfer_date"][$firstcount] = $row["transfers_transfer_date"];
            $data["transfers_transfer_status"][$firstcount] = $row["transfers_transfer_status"];
            ///echo $data["id"][$firstcount];
            ///echo $row["transfers_transfer_status"];
            
            $firstcount++;
        }
        
        ///echo $firstcount." ";///for testing

        
        $prioritycode = 0;//use to keep track of which set of commands the ee goes through
        
        //array to hold unwanted duplicates
        $newarray = array("id"=>array(),"ee"=>array());
        $secondcount = 0;
        
        $count = 1;//count number of dups per employee
        
        //loop through count (y) of array
        for ($i = 0; $i <= $y; $i++)
        {
            //pull ee number to test how many 
            $test = $data["ee"][$i];

            ///echo $data["transfers_transfer_date"][$i]." ";
            
            //stop and do this process when ee no longer the same
            if ($test != $data["ee"][($i + 1)])
            {
            //stops single employees from entering this process
            if ($count > 1)
            {
                ///echo $count.' ';///for testing
                
                //set priority
                for ($j = 0; $j <= $count - 1; $j++)
                {
                    //Ordered Priorities by
                    
                    //Check for declined but only if not already a higher priority
                    if ($data["transfers_transfer_status"][($i - $j)] == 'Declined' AND $prioritycode != 1 AND $prioritycode != 2)
                    {
                        $prioritycode = 3;
                        ///echo $prioritycode." ";
                        ///echo $data["transfers_transfer_status"][($i - $j)];
                    }
                    
                    //Check for Accepted and Issued but not if there are any transferred
                    if (($data["transfers_transfer_status"][($i - $j)] == 'Accepted' OR $data["ee"][($i - $j)] == 'Issued') AND $prioritycode != 1)
                    {
                        $prioritycode = 2;
                        ///echo $prioritycode." ";
                        ///echo $data["transfers_transfer_status"][($i - $j)];
                    }
                    
                    //Check if transferred
                    if ($data["transfers_transfer_status"][($i - $j)] == 'Transferred')
                    {
                        $prioritycode = 1;
                        ///echo $prioritycode." "; 
                        ///echo $data["transfers_transfer_status"][($i - $j)];                        
                    }
                }

                //add undesirable duplicates to array              
                if ($prioritycode == 1)
                {
                    //get rid of non transferred, create holder array to be used for rest of priority code 1 (safer)                      
                    $holder = array("transdate"=>array(),"id"=>array(),"ee"=>array(), "transfers_transfer_status"=>array(), "flag"=>array());
      
                    for ($k = 0; $k <= $count - 1; $k++)//minus one because of array starting at 0
                    {
                        //$i - $k = (total count - iteration) which will stop at $count or how many dups ex 100 total 3 name will stop at 98 (100, 99,98)
                        $holder["transdate"][$k] = $data["transfers_transfer_date"][($i - $k)];
                        $holder["id"][$k] = $data["id"][($i - $k)]; 
                        $holder["ee"][$k] = $data["ee"][($i - $k)];
                        $holder["transfer"][$k] = $data["transfers_transfer_status"][($i - $k)];

                        //flag items that are not transferred (not priority 1)
                        if ($data["transfers_transfer_status"][($i - $k)] != 'Transferred')
                        {
                            $holder["flag"][$k] = "Yes";
                        }
                     
                        //loop through all the dates checking if less than and same priority
                        for ($x = 0; $x <= $count - 1; $x++)
                        {
                            ///echo $holder["transdate"][$k]." ";
                            
                            //if date less than other dates
                            if ($holder["transdate"][$k] < $data["transfers_transfer_date"][($i - $x)] AND $data["transfers_transfer_status"][($i - $x)] == 'Transferred')   
                            {
                                $holder["flag"][$k] = "Yes";
                            }
                        } 
                        ///echo $holder["ee"][$k]." ";
                    }
                   
                    
                    //add flagged items to newarray to be added to dup table below
                    for ($k = 0; $k <= $count - 1; $k++)
                    {
                        
                        if ($holder["flag"][$k] == "Yes")
                        {
                            $newarray["id"][$secondcount] = $holder["id"][$k];
                            $newarray["ee"][$secondcount] = $holder["ee"][$k];
                            $secondcount++; 
                        }   
                       
                    }
                    
                    ///echo " Hi ";
                }
                
                if ($prioritycode == 2)
                {            
                    //get rid of non transferred, create holder array to be used for rest of priority code 2 (safer)                      
                    $holder = array("transdate"=>array(),"id"=>array(),"ee"=>array(), "transfers_transfer_status"=>array(), "flag"=>array());
                    
                    
                    for ($k = 0; $k <= $count - 1; $k++)
                    {
                        //$i - $k = (total count - iteration) which will stop at $count or how many dups ex 100 total 3 name will stop at 98 (100, 99,98)
                        $holder["transdate"][$k] = $data["transfers_transfer_date"][($i - $k)];
                        $holder["id"][$k] = $data["id"][($i - $k)]; 
                        $holder["ee"][$k] = $data["ee"][($i - $k)];
                        $holder["transfer"][$k] = $data["transfers_transfer_status"][($i - $k)];
                        //echo "Outer ";

                        //flag items that are not accepted or issued (not priority 2) first check if accepted then issued
                        if ($data["transfers_transfer_status"][($i - $k)] != 'Accepted')
                        {
                            if ($data["transfers_transfer_status"][($i - $k)] != 'Issued')
                            {                      
                                $holder["flag"][$k] = "Yes";
                            }
                            
                        }
                    
                        //loop through all the dates checking if less than and same priority
                        for ($x = 0; $x <= $count - 1; $x++)
                        {
                            //if date less than other dates - had to use main array because holder array was not created on first go
                            if ($holder["transdate"][$k] > $data["transfers_transfer_date"][($i - $x)] AND $data["transfers_transfer_status"][($i - $x)] == 'Accepted')   
                            {
                                $holder["flag"][$k] = "Yes";
                                ///echo " ACC ";
                            }   
                            else if ($holder["transdate"][$k] > $data["transfers_transfer_date"][($i - $x)] AND $data["transfers_transfer_status"][($i - $x)] == 'Issued' )   
                            {
                                $holder["flag"][$k] = "Yes";
                                ///echo " ISS ";                                
                            }
                            else
                            {
                                ///echo " NONE ";                                
                            }
                            
                        }
                        
                    }
                    
                    //add flagged items to newarray to be added to dup table below
                    for ($k = 0; $k <= $count - 1; $k++)
                    {
                        
                        if ($holder["flag"][$k] == "Yes")
                        {
                            $newarray["id"][$secondcount] = $holder["id"][$k];
                            $newarray["ee"][$secondcount] = $holder["ee"][$k];
                            $secondcount++; 
                            ///echo 'inner ';
                        }   
                       
                    }
                    ///echo " Med ";
                }
                    
                if ($prioritycode == 3)
                {                    
                    ///echo " Low ";
                    
                    //get rid of extra declined, create holder array to be used for rest of priority code 2 (safer)                      
                    $holder = array("transdate"=>array(),"id"=>array(),"ee"=>array(), "transfers_transfer_status"=>array(), "flag"=>array());                    
                    
                    //add all but last declined to holder array to be added to deleted table (reason for minus 2)
                    for ($k = 0; $k <= $count - 2; $k++)
                    {
                        $holder["transdate"][$k] = $data["transfers_transfer_date"][($i - $k)];
                        $holder["id"][$k] = $data["id"][($i - $k)]; 
                        $holder["ee"][$k] = $data["ee"][($i - $k)];
                        $holder["transfer"][$k] = $data["transfers_transfer_status"][($i - $k)];
                        
                        $holder["flag"][$k] = "Yes";
                    }                    
                       
                    
                    //add flagged items to newarray to be added to dup table below
                    for ($k = 0; $k <= $count - 1; $k++)
                    {
                        
                        if ($holder["flag"][$k] == "Yes")
                        {
                            $newarray["id"][$secondcount] = $holder["id"][$k];
                            $newarray["ee"][$secondcount] = $holder["ee"][$k];
                            $secondcount++; 
                            ///echo 'inner ';
                        }   
                       
                    }
                }
                
                
            }   
                //reset count and priority for next ee
                $count = 0;
                $prioritycode = 0;
            
            }
                            
            $count++;
                
        }
        
        //delete table contents to refil with new data
        mysql_query("DELETE FROM transfer_dups_tim");

        ///$sql = "INSERT INTO transfer_dups_tim (ee, ID) VALUES (123, 1234)";
        
        ///mysql_query($sql);
        
        echo 'Removed Duplicates '.$secondcount;
            
        for ($x = 0; $x <= $secondcount - 1; $x++)
        {
            mysql_query("INSERT INTO transfer_dups_tim (ee, ID) VALUES (". $newarray["ee"][$x] . ", " . $newarray["id"][$x] .")");
            
        }

        
        ?>
