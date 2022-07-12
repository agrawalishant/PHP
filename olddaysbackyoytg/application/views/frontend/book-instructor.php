  
  <script>
      $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
  </script>
  
  <div class="warpper clearfix">

        <!--Features app-->

        <section id="features-app" class="padd-80 head-section">

            <!--container-->

            <div class="container">
                <div class="row tim-sec">
                        
                    <div class="col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                        <div class="col-md-4 col-sm-12 col-xs-12 bhoechie-tab-menu">
                            <div class="list-group-item text-center">
                                <h3>Date</h3>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item active text-center">
                                  <h4 class="glyphicon glyphicon-plane">1-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">2-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">3-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">4-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">5-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">6-September-2020</h4>
                                </a>
                                <a href="#" class="list-group-item  text-center">
                                  <h4 class="glyphicon glyphicon-plane">7-September-2020</h4>
                                </a>
                            </div>
                            <div class="list-group-item text-center">
                      <i class="fa fa-calendar-check-o" aria-hidden="true"> View Calender</i>
                      <input type="date" id="birthday" class="form-control" name="birthday">
                  </div>
                    
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 bhoechie-tab">
                    <!-- flight section -->
                    <div class="list-group-item text-center cl">
                      <h3>Time</h3>
                    </div>
                    <div class="bhoechie-tab-content active">
                            <div cass="col-md-4">
                                <div class="dv-tm">
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>9:00 AM - 10:00AM</p>
                                </div>
                            </div>
                            <div cass="col-md-4">
                                <div class="dv-tm">
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>9:00 AM - 10:00AM</p>
                                </div>
                            </div>
                            <div cass="col-md-4">
                                <div class="dv-tm">
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>9:00 AM - 10:00AM</p>
                                </div>
                            </div>
                    </div>
                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        
                        <center>
                          
                        </center>
                        
                    </div>
        
                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <center>
                         
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                          
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                          
                        </center>
                    </div>
                
                        </div>
                    </div>    
                        
                    <!-- content tab-->

                    <!-- content tab-->

                </div>
   
            <!--container-->
            </div>
        </section>






 


      

        <!--contact-->
       

    </div>