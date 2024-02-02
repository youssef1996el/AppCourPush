$(document).ready(function() {
    // Initialize evoCalendar
    $('#calendar').evoCalendar({

        language: 'fr',
        theme: 'Midnight Blue'
    });

    function CalanderCours() {
        $.ajax({
            type: "get",
            url: url,
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {


                    var textTypeCours ='';

                    response.data.forEach(function (event) {
                        if(event.typecours === 'prive')
                        {
                            textTypeCours ='Profitez d\'une attention individuelle lors de votre cours ';
                        }
                        else
                        {
                            textTypeCours ='Vous optez pour l\'intercation social àla diversité des prespections offertes par le cours en groupe ';
                        }
                        $('#calendar').evoCalendar('addCalendarEvent',
                        [
                            {
                                  id: String(event.id),
                                  name: event.name_cours,
                                  description: 'Explorer une session de '+event.name_cours+' avec M /Mr '+event.name_professeur+' a ' +event.time+' ou vous découvrez ensemble\
                                                 les fondamenteaux de ce cours dqns un environement de ' +event.typecours+ ' stimulant. <br/> ' +textTypeCours,
                                  date: event.date,
                                  type: event.typecours,
                                  everyYear: true
                             },
                             

                        ]);
                    });
                }
            },
            error: function (error) {
                console.error("Error fetching calendar events:", error);
            }
        });
    }


    CalanderCours();
    // Add calendar event
    /* $('#calendar').evoCalendar('addCalendarEvent',
    [
         {
              id: 'kNybja6',
              name: 'Mom\'s Birthday',
              date: 'Feb 27, 2024',
              type: 'birthday',
              everyYear: true // optional
         },
         {
              id: 'asDf87L',
              name: 'Graduation Day!',
              date: 'Feb 21, 2024',
              type: 'event',
            everyYear: true // optional
         }
    ]); */
 });
