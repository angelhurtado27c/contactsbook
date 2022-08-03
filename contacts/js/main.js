import {add} from './add.js'
import {Bring} from './bring.js'
import {Update} from './Update.js'
import {DeleteContact} from './Delete.js'

const bring = new Bring
const update = new Update
const deleteContact = new DeleteContact

$add.onclick = add
document.ondblclick = update.edit
window.oncontextmenu = deleteContact.showOption