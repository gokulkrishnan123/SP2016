<?php
echo "Matches: ";
session_start();
        require 'database.php';
        $stmt = $mysqli->prepare("SELECT U.ID AS id, U.Name as name, U.url as url, S.clean, S.bio, S.roommateClean, S.cleanImportance, S.noise, S.roommateNoise, S.noiseImportance, S.people, S.roommatePeople, S.peopleImportance, S.smoke, S.roommateSmoke, S.smokeImportance, S.drink, S.roommateDrink, S.drinkImportance, S.roommateScore as roommateScore, S.pet as sleep, S.roommatePet as roommateSleep, S.petImportance as sleepImportance, S.temp as temp, S.roommateTemp as roommateTemp, S.tempImportance as tempImportance, U.isMatched as isMatched FROM Users as U, SurveyAnswers as S WHERE (U.ID=S.userID)");
        if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
        }


        $stmt->execute();


        $result = $stmt->get_result();

        $user_id = $_SESSION['fbloginid'];

        echo "<ul>\n";
		
		
		
		
		
		$user_roommate_score = 0;
			
		$my_score = 0;
		
		$other_score = 0;
		
		$stack = 0;
		
		$other_stack = 0;
		
		$array_matches = array();
		
        while($row = $result->fetch_assoc())
        {
		
                if ($user_id == $row["id"])
                {
					
					$stack = $row;
			
                        //$user_roommate_score = $row["S.roommateScore"];
						
						//$clean = $row["S.roommateClean"];
						
						//$clean = $row["S.roommateScore"];
						
						//$clean = $row["S.roommateScore"];
						
						//$clean = $row["S.roommateScore"];
						
						//$clean = $row["S.roommateScore"];
                }

        }
        mysqli_data_seek($result, 0);


        while($row = $result->fetch_assoc())
        {
		$my_score = 0;
		$other_score = 0;
		
        if ($user_id != $row["id"] && $row["isMatched"] == 0)
         {
				$sim_1 = "";
				$sim_2 = "";
				$sim_3 = "";
				$sim_4 = "";
				$sim_5 = "";
				$sim_6 = "";
				$sim_7 = ""; 
				$other_stack = $row;
				//first, how I fit to other's specifications
				if ($stack['clean'] == $other_stack['roommateClean'])
				{
					$my_score += $other_stack['cleanImportance'];
				}
				
				if ($stack['roommateClean'] == $other_stack['clean'])
				{
					$other_score += $stack['cleanImportance'];
					$sim_1 = 'Cleanliness';
				}
				
				if ($stack['noise'] == $other_stack['roommateNoise'])
				{
					$my_score += $other_stack['noiseImportance'];
				}
				
				if ($stack['roommateNoise'] == $other_stack['noise'])
				{
					$other_score += $stack['noiseImportance'];
					$sim_2 = 'Noise';
				}
				
				if ($stack['people'] == $other_stack['roommatePeople'])
				{
					$my_score += $other_stack['peopleImportance'];
				}
				
				if ($stack['roommatePeople'] == $other_stack['people'])
				{
					$other_score += $stack['peopleImportance'];
					$sim_3 = 'People Over';
				}
				
				if ($stack['smoke'] == $other_stack['roommateSmoke'])
				{
					$my_score += $other_stack['smokeImportance'];
				}
				
				if ($stack['roommateSmoke'] == $other_stack['smoke'])
				{
					$other_score += $stack['smokeImportance'];
					$sim_4 = 'Smoking';
				}
				
				if ($stack['drink'] == $other_stack['roommateDrink'])
				{
					$my_score += $other_stack['drinkImportance'];
				}
				
				if ($stack['roommateDrink'] == $other_stack['drink'])
				{
					$other_score += $stack['drinkImportance'];
					$sim_5 = 'Drinking';
				}

				if ($stack['sleep'] == $other_stack['roommateSleep'])
                                {
                                        $my_score += $other_stack['sleepImportance'];
                                }

                                if ($stack['roommateSleep'] == $other_stack['sleep'])
                                {
                                        $other_score += $stack['sleepImportance'];
                                        $sim_6 = 'Sleep Time';
                                }


				 if ($stack['temp'] == $other_stack['roommateTemp'])
                                {
                                        $my_score += $other_stack['tempImportance'];
                                }

                                if ($stack['roommateTemp'] == $other_stack['temp'])
                                {
                                        $other_score += $stack['tempImportance'];
                                        $sim_7 = 'Temperature';
                                }


				
				$my_sim = $my_score/$other_stack['roommateScore'];
				
				$other_sim = $other_score/$stack['roommateScore'];
				
				$product_sim = $my_sim * $other_sim;
				
				$similarity = pow($product_sim, 1/7) * 100;

				//echo $sim_1;
				//echo $sim_2;
				//echo $sim_3;
				//echo $sim_4;
				//echo $sim_5;
				
				$match = array($row["name"], $row["url"], round($similarity), $row["id"], $sim_1, $sim_2, $sim_3, $sim_4, $sim_5, $row["bio"], $row["id"], $sim_6, $sim_7);

				array_push($array_matches, $match);

	
                //$difference = abs($user_score - $row["score"]);
                //$similarity = 1 - ($difference/$user_score);
				
                //printf("\t<li>%s %s</li>\n",
		//		        htmlspecialchars($row["name"]),
                //        htmlspecialchars(100 * $similarity)

               //); 
         }
        }

	function cmp ($a, $b)
	{
		//print_r($a);
		//print_r($b);
		//echo $a[2];
		return ($a[2] > $b[2]) ? -1 : 1;
		//echo $a["similarity"];
		//echo $b["similarity"];
	}

	foreach ($array_matches as $key => $row)
	{
		//echo $key;
		//echo $row;
	}	

	//print_r($array_matches);
	usort($array_matches, "cmp");

	//print_r($array_matches);

	$_SESSION['matches'] = $array_matches;

	$_SESSION['matchSet'] = 0;	

	//print_r($_SESSION['matches']);	

        echo "</ul>\n";


        $stmt->close();
header('Location: matches.php');
?>


