<div id="edit_quote">
    
    <h1 class="page-header">Zitate</h1>
    
    <!-- table of all quotes -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Zitate von wuza.ch, geordnet nach dem Datum</div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="id">#</th>
                        <th class="date">Datum</th>
                        <th class="quote">Zitat</th>
                        <th class="author">Author</th>
                        <th class="help">Hilfe</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- all quotes -->
                    <?php
                    foreach($this->_['quotes'] as $quote){
                        $href = "admin.php?page=add_quote&action=get_quote&user_id=".$quote['user_id'];
                    ?>
                    <tr>
                        <td class="id"><a href="<?php echo $href; ?>"><?php echo $quote['user_id']; ?></a></td>
                        <td class="date"><?php echo $quote['date']; ?></td>
                        <td class="quote"><?php echo $quote['quote']; ?></td>
                        <td class="author"><?php echo $quote['author']; ?></td>
                        <td class="help"><?php echo $quote['help']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    
    
    
    
        
    
</div>