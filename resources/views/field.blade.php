<div id="field">
    <div class="flex-center">
        <div class="container">
            <?php $k = 0; ?>
            @for($i=0;$i<4;++$i)
                <div class="row dice-row">
                    @for($j=0;$j<4;++$j)
                        <div class="col dice-side">
                            {{ $currentRound->field->content[$k++] }}
                        </div>
                    @endfor
                </div>
            @endfor
        </div>
    </div>
</div>
