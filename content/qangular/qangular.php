<script src="www/angular-seed-master/app/lib/angular/angular.js"></script>

  <script src="www/angular-seed-master/app/lib/angular/angular-route.js"></script>
  <script src="www/angular-seed-master/app/lib/angular/angular-resource.js"></script>
  <script src="www/angular-seed-master/app/js/app.js"></script>
  <script src="www/angular-seed-master/app/js/services.js"></script>
  <script src="www/angular-seed-master/app/js/controllers.js"></script>
  <script src="www/angular-seed-master/app/js/filters.js"></script>
  <script src="www/angular-seed-master/app/js/directives.js"></script>
<div ng-app="quotesApp">

<ul class="qmenu">
    <li><a href="#/quoteslist">Quotes</a></li>
    

</ul>

  <div ng-view></div>

  <div>Angular seed app: v<span app-version></span></div>


</div>