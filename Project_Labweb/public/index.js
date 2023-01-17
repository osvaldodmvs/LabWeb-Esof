//using "window" is just for the stackblitz, you do not need to do this
window.datetimepicker1 = new tempusDominus.TempusDominus(
    document.getElementById('datetimepicker1'),
    {
      
    }
  );
  
  document.getElementById(
    'info'
  ).innerHTML = `Your browser's locale is ${navigator.language}.<br/>
  You are using version ${tempusDominus.version}`;
  