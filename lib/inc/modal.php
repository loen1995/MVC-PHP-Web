<!-- Modal Quotes -->

<?php foreach ($list as $a){ ?>
                       
    <div class="modal fade" id="Modal<?=$a->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?=$a->getId() ?>LongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal<?=$a->getId() ?>LongTitle">Quote</h5>
            </div>
            <div class="modal-body">
            <?php
                $listQBYA = $cnt->quoteByAuthor($a->getId());
                foreach ($listQBYA as $q){ 
            ?>
                <blockquote class="blockquote mb-0">
                <a href="details.php?q= <?=$q->getId() ?>"> <?=$q->getQuote() ?></a>
                <footer class="blockquote-footer"><?=$q->getDate() ?></footer>
                <br>
                <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?>
                <a role="button" class="btn btn-info" href="update.php?q=<?=$q->getId()?>">
                    Modify Quote
                </a>
                <?php } ?> 
                <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Standard"){   ?>
                <a role="button" class="btn btn-info" href="update.php?q=<?=$q->getId()?>">
                    Modify Quote
                </a>
                <?php } ?> 
                <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?>
                <a role="button" class="btn btn-danger" href="delete.php?q=<?=$q->getId()?>">
                    Delete Quote
                </a>
                <?php } ?> 
                <!-- Examen -->
                <a role="button" class="btn btn-success" href="forms/likes.php?q=<?=$q->getId()?>">
                Like (<?=$q->getLikes() ?>)
                </a>
                </blockquote>
            <?php } ?>  
                <br>
                <form action="forms/add.php" method="post">
                    <div class="form-group">
                        <label for="quoteQuote">Quote</label>
                        <input type="text" class="form-control" id="quoteQuote" name="quoteQuote"  placeholder="Write the Quote here" required>
                    </div>
                    <div class="form-group">
                        <label for="dateQuote">Date</label>
                        <input type="date" class="form-control" id="dateQuote" name="dateQuote" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idAuthor" name="idAuthor" value="<?=$a->getId()?>">
                    </div>
                    <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?>
                    <button type="submit" name="addQuote" class="btn btn-primary">Add Quote</button>
                    <?php } ?>
                    <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Standard"){   ?>
                    <button type="submit" name="addQuote" class="btn btn-primary">Add Quote</button>
                    <?php } ?>
                </form>
                    
            </div>

            <div class="modal-footer">    
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Modal Create Author -->

<div class="modal fade" id="ModalCreateAuthor" tabindex="-1" role="dialog" aria-labelledby="ModalCreateAuthorLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalCreateAuthorLongTitle">Create Author</h5>
        </div>
        <div class="modal-body">
            <blockquote class="blockquote mb-0">
                <form action="forms/add.php" method="post">
                    <div class="form-group">
                        <label for="nameAuthor">Author Name</label>
                        <input type="text" class="form-control" id="nameAuthor" name="nameAuthor"  placeholder="Write the Author Name here" required>
                    </div>
                    <div class="form-group">
                        <label for="surnameAuthor">Author Surname</label>
                        <input type="text" class="form-control" id="surnameAuthor" name="surnameAuthor" placeholder="Write the Author Surname here" required>
                    </div>
                    <div class="form-group">
                        <label for="countryAuthor">Author Country</label>
                        <input type="text" class="form-control" id="countryAuthor" name="countryAuthor" placeholder="Write the Author Country here" required>
                    </div>
                    <footer><button type="submit" name="addAuthor" class="btn btn-primary">Submit</button></footer>
                </form>
            </blockquote>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>