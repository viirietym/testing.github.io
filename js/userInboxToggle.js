
        const unreadLabel = document.getElementById('unread-label');
        const readLabel = document.getElementById('read-label');

        
        function setActive(label) {
           
            unreadLabel.classList.remove('active');
            readLabel.classList.remove('active');

           
            label.classList.add('active');
        }

        
        unreadLabel.addEventListener('click', function () {
            setActive(unreadLabel);
        });

        readLabel.addEventListener('click', function () {
            setActive(readLabel);
        });