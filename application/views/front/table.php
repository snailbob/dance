    <section class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Search Dance Class</h2>
                    <hr class="light">
                    <p class="text-faded">Find dance classes<?php if(isset($_GET['location'])) { echo ' in '.$_GET['location'];}?>. Search here to see all dance schools on our directory<?php if(isset($_GET['location'])) { echo ' located in  '.$_GET['location'];}?>.</p>
                </div>
            </div>
        </div>
        
      
        
    </section>

    <div class="search_class">
    
  
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 req_search_result">
                
                
                    
                    <div class="row">
                        <div class="panel-body map-container" id="map-canvas" style="min-height: 289px;">
                        </div>
                    
                    </div>
                    <hr />
                  <form id="request_form">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control request_quote_location" name="location" id="location"  value="<?php if(isset($_GET['location'])) { echo $_GET['location']; } ?>" />
                        <input type="hidden" name="lat" />
                        <input type="hidden" name="long" />
                        <input type="hidden" name="space_id" value="" />
    
                    </div>
                    
                    <div class="more_filter request_trigger">
                        <div class="form-group">
                        	<label>Genre</label>
                            <select name="genres" class="form-control">
                                <option value="">Select</option>
                                <?php
                                    foreach($genres as $r=>$value){
                                        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                    
                    
                        <div class="form-group">
                        	<label>Days of Week</label>
                            <select name="dayweek" class="form-control">
                                <option value="">Select</option>
                                <?php
                                    foreach($days_of_week as $value){
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                          <label class="control-label" for="radios">Distance</label><br />
                            <?php
                                $distance = '20';
                                if (isset($_GET['distance'])){
                                    $distance = $_GET['distance'];
                                }
                            ?>
                            <div class="btn-group" data-toggle="buttons">
                              <label class="btn btn-warning <?php if($distance == '10') { echo 'active';}?>">
                                <input type="radio" name="distance" id="distance1" autocomplete="off" value="10" <?php if($distance == '10') { echo 'checked="checked"';}?>> 10 km.
                              </label>
                              <label class="btn btn-warning <?php if($distance == '20') { echo 'active';}?>">
                                <input type="radio" name="distance" id="distance2" autocomplete="off" value="20" <?php if($distance == '20') { echo 'checked="checked"';}?> checked="checked"> 20 km.
                              </label>
                              <label class="btn btn-warning <?php if($distance == '30') { echo 'active';}?>">
                                <input type="radio" name="distance" id="distance3" autocomplete="off" value="30" <?php if($distance == '30') { echo 'checked="checked"';}?>> 30 km.
                              </label>
                              <label class="btn btn-warning <?php if($distance == '40') { echo 'active';}?>">
                                <input type="radio" name="distance" id="distance4" autocomplete="off" value="40" <?php if($distance == '40') { echo 'checked="checked"';}?>> 40 km.
                              </label>
                            </div>
    
                        </div>
                    
                    
                    </div><!--more_filter-->
                    
                    <div class="form-group">
                        <a class="btn btn-primary" onclick="$('.more_filter').find('.form-group').slideToggle('fast');" data-toggle="button" aria-pressed="false" autocomplete="off">More Filter</a>
                        <button class="btn btn-orange2 hidden">Request Quotes</button>
                    </div>
                
                  </form>
                  
    
                  
                  
                </div>
              
                <div class="col-md-7 req_search_result" style="border-left: 1px solid #eee;">
    
                    
    
                    <div class="">
                        
                        <table class="space_datatable table table-hover" style="margin-top: 0px !important;">
                             <thead>
                                <tr class="hidden">
                                    <th class="hidden">Distance</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>                        
                    </div>
    
                    <div class="row space_results">
                       
                    </div>
                    
                    
                    
                    
                
                
                </div>        
        </div>

        </div><!--container-fluid-->
            
    </div>


	<section class="genres bg-warning">
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-sm-12">
                
                
                <h2 class="section-heading text-center">Genres</h2>
                <hr class="primary" />
                
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Acrobatics">Acrobatics</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Aerobic">Aerobic</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/African-Dance">African Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Afro-Brazilian">Afro-Brazilian</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Afro-Latin-Funk">Afro-Latin Funk</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Argentinean">Argentinean</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Bachata">Bachata</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Ballet">Ballet</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Ballet-Adult">Ballet Adult</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Ballroom-Dancing">Ballroom Dancing</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Baton-Twirling">Baton/Twirling</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Belly-Dance">Belly Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Bolero">Bolero</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Bollywood">Bollywood</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Booty-Shake">Booty Shake</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Break-Dance">Break Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Bridal-Waltz">Bridal Waltz</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Burlesque">Burlesque</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Calisthenics">Calisthenics</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Cha-Cha">Cha Cha</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Charleston">Charleston</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Cheerleading">Cheerleading</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Childrens">Childrens</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Classical">Classical</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Club-RnB">Club RnB</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Club-Party-Dance">Club/Party Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Contemporary">Contemporary</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Country-Waltz">Country Waltz</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Country-Western">Country Western</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Creative">Creative</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Disco">Disco</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Egyptian-Dance">Egyptian Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Exotic">Exotic</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Flamenco">Flamenco</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Folk-Dancing">Folk Dancing</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Fox-Trot">Fox Trot</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Funk">Funk</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Gymnastics">Gymnastics</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Hawaiian-Hula">Hawaiian Hula</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Hens-Night-Parties">Hens Night Parties</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Hip-Hop">Hip Hop</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Historical">Historical</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Irish-Dance">Irish Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Jamaican">Jamaican</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Jazz">Jazz</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Jazz-Funk-Hip-Hop">Jazz Funk Hip-Hop</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Jive">Jive</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Latin">Latin</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Line-Dancing">Line Dancing</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Lyrical">Lyrical</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Merengue">Merengue</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Modern-Jazz">Modern Jazz</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Modern-Tango">Modern Tango</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Musical-Theatre">Musical Theatre</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/New-Vogue">New Vogue</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Paso-Doble">Paso Doble</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Performance">Performance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Physical-Culture---Physie">Physical Culture - Physie</a></td>
      <td width="20%" align="left" valign="top"><a href="http://www.yogapilatesfinder.com.au/" target="_blank">Pilates</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Pole-Dancing">Pole Dancing</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Popping">Popping</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Quick-Step">Quick Step</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Rock-N-Roll">Rock N Roll</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Rueda">Rueda</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Rumba">Rumba</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Salsa">Salsa</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Samba">Samba</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Spiritual-Dance">Spiritual Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Square-Dance">Square Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Street">Street</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Stretch">Stretch</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Swing">Swing</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Tango">Tango</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Tap">Tap</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Tiny-Tots">Tiny Tots</a></td>
    </tr>
    <tr>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Waltz">Waltz</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Wedding-Dance">Wedding Dance</a></td>
      <td width="20%" align="left" valign="top"><a href="http://www.yogapilatesfinder.com.au/" target="_blank">Yoga</a></td>
      <td width="20%" align="left" valign="top"><a href="<?php echo base_url() ?>landing/dance/Zumba">Zumba</a></td>
    </tr>
  </tbody>
</table>


                
                </div>
            </div>
        </div>
    
    
    </section>
