<div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
			<?php

			//SonIT Code

			//we have maximum 3 level of menu

			//build category array, we use only 1 query
			$query	= "SELECT * FROM tbl_category";
			$result = mysql_query($query);

			$rootCategoryArray	= array();
			$subCategoryArray	= array();


			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_assoc($result))
				{
					$categoryId		= $row['cat_id'];
					$categoryName	= $row['cat_name'];
					$categoryParent = $row['parent_id'];

					if($categoryParent == '-1')
					{
						//set to array
						$rootCategoryArray[$categoryId] = array(
							'name'			=> $categoryName,
							'parent_id'		=> $categoryParent
						);
					}
					else
					{
						//set to array
						$subCategoryArray[$categoryId] = array(
							'name'			=> $categoryName,
							'parent_id'		=> $categoryParent
						);
					}
				}
			}

			foreach($rootCategoryArray as $idCategory => $mixedData)
			{
				//find child level2
				$child2 = array();
				foreach($subCategoryArray as $subCategoryId => $mixedDataSub)
				{
					if($mixedDataSub['parent_id'] == $idCategory)
					{
						$child2[$subCategoryId] = $mixedDataSub;
					}
				}

				//no child level 2
				if(empty($child2))
				{
					echo '<li class="list-group-item clearfix"><a class="categoryItem" href="javascript:void(0);" rel='.$idCategory.'><i class="fa fa-angle-right"></i>'.$mixedData['name'].'</a></li>';
				}
				else
				{
					//write this menu, with +
					echo '
					<li class="list-group-item clearfix dropdown">
					<a class="categoryItem" href="javascript:void(0);" rel='.$idCategory.'>
					  <i class="fa fa-angle-right"></i>
					  '.$mixedData['name'].'
					  <i class="fa fa-angle-down"></i>
					</a>';

					//write drop down
					echo '<ul class="dropdown-menu">';
					foreach($child2 as $subCategoryIdLevel2 => $mixedDataSub2)
					{
						//find child level3
						$child3 = array();
						foreach($subCategoryArray as $subCategoryId => $mixedDataSub)
						{
							if($mixedDataSub['parent_id'] == $subCategoryIdLevel2)
							{
								$child3[$subCategoryId] = $mixedDataSub;
							}
						}
						//no child level3
						if(empty($child3))
						{
							echo '<li class="list-group-item clearfix"><a class="categoryItem" href="javascript:void(0);" rel='.$subCategoryIdLevel2.'><i class="fa fa-circle"></i>'.$mixedDataSub2['name'].'</a></li>';
						}
						else
						{
							//write this menu, with +
							echo '
							<li class="list-group-item clearfix dropdown">
							<a class="categoryItem" href="javascript:void(0);" rel='.$subCategoryIdLevel2.'>
							  <i class="fa fa-circle"></i>
							  '.$mixedDataSub2['name'].'
							  <i class="fa fa-angle-down"></i>
							</a>';

							//write drop down
							echo '<ul class="dropdown-menu">';
							foreach($child3 as $subCategoryIdLevel3 => $mixedDataSub3)
							{
								echo '<li class="list-group-item clearfix"><a class="categoryItem" href="javascript:void(0);" rel='.$subCategoryIdLevel3.'><i class="fa fa-circle"></i>'.$mixedDataSub3['name'].'</a></li>';
							}
							echo '</ul>';
						}
					}
					echo '</ul>';

				}
			}


			?>

            </ul>
          </div>