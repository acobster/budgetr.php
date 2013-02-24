<h2>Annual budget for <?= date( 'Y' ) ?></h2>

<form action="./?budget=annual" method="POST">

<p><?= $message ?></p>

<p><button type="submit" name="action" value="save">Save</button></p>

<input type="hidden" name="view" value="budget" />

<table id="budget" class="variations">
    <thead>
        <tr>
            <th class="budgetHeader">Name</th>
            <th class="budgetHeader">Description</th>
            <th class="budgetHeader">Category</th>
            <th class="budgetHeader">Day</th>
            <th class="budgetHeader" colspan="2">Amount</th>
        </tr>
    </thead>

    <?php if( empty( $items ) ) : ?>
    <tr class="variation">
        <td class="itemName">            
            <input type="text" class="nameInp sortField"
            name="item[new][0][name]"
            value="" />
        </td>
        <td class="description">
            <input type="text" class="description sortField"
            name="item[new][0][description]"
            value="" />
        </td>
        <td class="category">
            <?= $this->catDropdownList( $categories, $item ) ?>
        </td>
        <td class="day">
            <input type="text" class="sortField"
            name="item[new][0][day]"
            value="" />
        </td>
        <td class="amount">
            $ <input type="text" name="item[new][0][amount]" value="" />
        </td>
        <td class="removeVar" title="Remove this budget item">
            <img src="images/remove.png" />
            <input type="hidden" name="itemid[]"
            value="" />
        </td>
    </tr>
    <?php else : ?>
    
    <?php foreach( $items as $item ) : ?>
    <?php $id = $item['id']; ?>
    <tr class="variation">
        <td class="itemName">            
            <input type="text" class="nameInp sortField"
            name="item[<?= $id ?>][name]"
            value="<?= $item['name'] ?>" />
        </td>
        <td class="description">
            <input type="text" class="description sortField"
            name="item[<?= $id ?>][description]"
            value="<?= $item['description'] ?>" />
        </td>
        <td class="category">
            <?= $this->catDropdownList( $categories, $item ) ?>
        </td>
        <td class="day">
            <input type="text" class="sortField"
            name="item[<?= $id ?>][day]"
            value="<?= $item['day'] ?>" />
        </td>
        <td class="amount">
            $ <input type="text" class="sortField"
            name="item[<?= $id ?>][amount]"
            value="<?= $this->formatAmt( $item['amount'] ) ?>" />
        </td>
        <td class="removeVar" title="Remove this budget item">
            <img src="images/remove.png" />
            <input type="hidden" name="itemid[]"
            value="<?= $id ?>" />
        </td>
    </tr>
    <?php endforeach; ?>
<?php endif; ?>
        
    <tfoot>
    <tr class="addVar" >
        <td colspan="4">
            <span title="Add a budget item">
                <img src="images/plus.png" />
                Add a budget item
            </span>
        </td>
    </tr>
    <tr class="budgetTotal" title="Budget total">
        <td colspan="4">Starting budget:</td>
        <td class="amount">$<?= $this->formatAmt( $starting ) ?></td>
        <td></td>
    </tr>
    <tr title="Expenses total">
        <td colspan="4">Expenses:</td>
        <td class="amount">$<?= $this->formatAmt( $total ) ?></td>
        <td></td>
    </tr>
    <tr class="remaining" title="Budget total">
        <td colspan="4">Remaining:</td>
        <td class="amount">$<?= $this->formatAmt( $remaining ) ?></td>
        <td></td>
    </tr>
	</tfoot>

</table>

<p><button type="submit" name="action" value="save">Save</button></p>

</form>


<aside>

<p><a href="./?view=budget&budget=monthly">View monthly budget</a></p>

<?= $this->parseTemplate( 'aside.categories' ) ?>

</aside>