    <?php echo $this->element('links'); ?>    
    
    <h3 class="text-center">Error Retrieving Access Token:</h3>
    
    <?php include '_error.ctp' ?>

    <div class="text-center"><a href="{{ path('homepage') }}">Head back</a></div>