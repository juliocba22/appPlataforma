require('./bootstrap');
Echo.channel('notifications')
    .listen('AuthLoginEventHandler', (e) => {
      console.log("ASP");
      alert('OK');
        const notificationElement = document.getElementById('notification');

        notificationElement.innerText = e.message;

        notificationElement.classList.remove('invisible');
      //  notificationElement.classList.remove('alert-success');
        //notificationElement.classList.remove('alert-danger');

        notificationElement.classList.add('alert-success');
    });


    
