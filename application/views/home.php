<script> var page_name = "home"; </script>
<section class="features" id="features">
<div ng-app="feedApp">
<div class="container" ng-controller="feedsController">
    <div class="row">
        <div class="card col-xs-12 col-sm-6 col-md-3 col-lg-3" ng-repeat="x in feeds">
            <div class="card-header" style="background-image: url('{{x.response.media}}');">
                <div class="card-header-mask">
                    <div class="card-header-date">
                        <div class="card-header-date-day">{{x.feed_date | dateForFilter:'date'}}</div>
                        <div class="card-header-date-month">{{x.feed_date | dateForFilter}}</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body-header">
                    <div class="card-body-header-category">{{x.feed_source}}</div>
                    <h1>{{x.brand_name}}</h1>
                    <p class="card-body-header-sentence">
                        They call it <span>"</span>God's Own Country.<span>"</span>
                    </p>
                </div>
                <p class="card-body-description">
                    {{x.response.text}}
                </p>
                <div class="card-body-footer">
                    <i class="icon icon-time"></i> {{x.feed_date | dateFormater}}
                    <i class="icon icon-comment"></i> 39 comments
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module("feedApp", []);

app.controller("feedsController", function($scope,$http) {
   $scope.feeds = [];
   $http({
    url : 'https://beingbeard.com/welcome/rest/getFeeds',
    method : 'GET',
    headers: {
            'Content-type': 'application/json'
        }
   }).then(function(res){
        if(res.status==200)
        {
            $scope.feeds = res.data;
        }
        else
            alert('something went wrong!!');
   })
   for (var i = 0; i < $scope.feeds.length; i++) {
       $scope.feeds[i].response = JSON.parse($scope.feeds[i].response);
   }
});





/********* filter **********/
app.filter('dateFormater', function() {
    return function(date) {
      //alert(date.replace(/\s+/g, 'T'));
      date = new Date(date.replace(/\s/, 'T'));

      var seconds = Math.floor((new Date() - date) / 1000);

      var interval = Math.floor(seconds / 31536000);

      if (interval > 1) {
        return interval + " years ago";
      }
      interval = Math.floor(seconds / 2592000);
      if (interval > 1) {
        return interval + " months ago";
      }
      interval = Math.floor(seconds / 86400);
      if (interval > 1) {
        return interval + " days ago";
      }
      interval = Math.floor(seconds / 3600);
      if (interval > 1) {
        return interval + " hours ago";
      }
      interval = Math.floor(seconds / 60);
      if (interval > 1) {
        return interval + " minutes ago";
      }
      return Math.floor(seconds) + " seconds ago";
    };
});


app.filter('dateForFilter', function() {
    return function(date,parm) {
      var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];
    date = ""+date;  

    var d = new Date(date.replace(/\s/, 'T'));

    if(isNaN(d))
      d = new Date();
//alert(d);
    if(parm=='date')
      return d.getDate();
    else
      return monthNames[d.getMonth()];

    };
});

</script>
</div>
</section>  