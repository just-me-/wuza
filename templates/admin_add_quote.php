<div id="add_quote">
    
    <h1 class="page-header">Zitat hinzufügen</h1>
        
    <!-- 2do: form generate -->
    
    <?php
        if($this->_['saved'] == "success") {
    ?>
    <div class="alert alert-success bootstrap-admin-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Gespeichert</h4>
        Zitat wurde erfolgreich gespeichert.
    </div>
    <?php
        }
        if($this->_['saved'] == "error") {
    ?>
    <div class="alert alert-danger bootstrap-admin-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Fehler</h4>
        Beim Speichern ist ein Fehler aufgetretten.
    </div>
    <?php
        }
    ?>
        
    <form action="admin.php" method="post">
        
        <div class="form-group quote">
            <label>Zitat</label>
            <textarea name="quote" class="form-control" rows="3"></textarea>
        </div>
        
        <div class="form-group author">
            <label>Author</label>
            <input name="author" class="form-control"/>
        </div>
        
        <div class="form-group help">
            <label>Hilfe/Hinweis</label>
            <textarea name="help" class="form-control" rows="2"></textarea>
        </div>
        
        <div class="form-group date">
            <label>Datum</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input name="date" class="form-control datepicker-here" type='text' placeholder="dd.mm.yyyy" data-position="top left" data-language='de'>
            </div>
        </div>
        
        <p>
            Zitat ID _ID
        </p>
        
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-save"></i> Speichern</button>
        <input type=hidden name="action" value="save_quote"/>
        <input type=hidden name="page" value="add_quote"/>
    
    </form>
        
    
</div>