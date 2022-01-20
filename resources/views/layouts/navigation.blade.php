<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('dashboard')}}">Task App</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li><a href="{{route('task')}}">Task</a></li>
      <li><a href="{{route('categories')}}">Category</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <form action="{{route('logout')}}" method="POST">
        @csrf
      <li><button><span class="glyphicon glyphicon-log-in"></span> Logout</button></li>
      </form>
    </ul>
  </div>
</nav>