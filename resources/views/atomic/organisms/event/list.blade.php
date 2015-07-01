<section id="eventList">
    @include('atomic.atoms.h2',['id' => 'eventListTitle','content'=>'Choose your event','classes' => ''])

    @include('atomic.molecules.event.list')

    @include('atomic.atoms.button',['id' => 'addEventButton','content'=>'Add Event','classes' => ''])
</section>