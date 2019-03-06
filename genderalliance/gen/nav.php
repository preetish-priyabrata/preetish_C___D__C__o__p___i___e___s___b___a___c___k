<nav>
  <ul class="nav-ul">
    <li class="nav-li">
      <a href="#">Main</a>
    </li>
    <li class="nav-li">
      <a href="#">About</a>
    </li>
    <li class="nav-li">
      <a href="#">Projects</a>
    </li>
    <li class="nav-li">
      <a href="#">Contacts</a>
    </li>
  </ul>
</nav>
<style type="text/css">
  a {
  color: inherit;
  text-decoration: none;
  outline: none;
}
.list-unstyled {
  padding: 0;
  margin: 0;
  list-style: none;
}
* {
  box-sizing: border-box;
}
html {
  background: #defbfd;
}
nav {
  height: 100%;
  font-family: 'MuseoSansCyrl', sans-serif;
  color: #3a3a3a;
}
nav .nav-ul {
  padding: 0;
  margin: 0;
  list-style: none;
  margin: 2.9375rem 2.3125rem 0;
  text-align: center;
}
nav .nav-li {
  display: inline-block;
  font-size: 1em;
}
nav .nav-li a {
  position: relative;
  display: block;
  margin: 0 2px;
  padding: 0.625rem 1.25rem;
  text-transform: uppercase;
  overflow: hidden;
}
nav .nav-li a:before {
  box-sizing: border-box;
  transform: translateX(100%);
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 99.5%;
  height: 2px;
  border-bottom: 2px solid transparent;
  border-left: 2px solid transparent;
}
nav .nav-li a:after {
  box-sizing: border-box;
  transform: translateX(-100%);
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 99.5%;
  height: 2px;
  border-top: 2px solid transparent;
  border-right: 2px solid transparent;
}
nav .nav-li a:hover {
  color: inherit;
  text-decoration: none;
}
nav .nav-li a:hover:before {
  transition: .1s transform linear, .1s height linear .1s;
  transform: translateX(0);
  height: 100%;
  border-color: #1fbfac;
}
nav .nav-li a:hover:after {
  transition: .1s transform linear .2s, .1s height linear .3s;
  transform: translateX(0);
  height: 100%;
  border-color: #1fbfac;
}

</style>