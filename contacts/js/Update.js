class Update {
	constructor() {
		this.$imgLoading = document.createElement('img')
		this.$imgLoading.src = 'css/img/loading.svg'
		this.$imgLoading.id = '$imgLoading'

		this.inputsUpdate = document.createElement('form')
		this.inputsUpdate.method = 'POST'
		this.inputsUpdate.action = 'php/update.php'
		this.inputsUpdate.innerHTML = $addForm.innerHTML
		this.inputsUpdate[3].id = ''
		this.inputsUpdate[3].value = 'Update'
		this.inputsUpdate[3].environment = this
		this.inputsUpdate[3].onclick = this.submitUpdate
	}




	edit = e => {
		let parent = e.target
		let childNodes
	
		if ( parent.localName == 'p' ) {
			parent = parent.parentNode
			childNodes = parent.childNodes
		} else if ( parent.localName == 'div' ) {
			try {
				if ( parent.childNodes[2].localName == 'p' )
					childNodes = parent.childNodes
			} catch {}
		}
	
		if ( childNodes && parent.className == '' ) {
			this.disableEditLastParent( parent )
	
			for (let i = 0; i < 3; i++)
				this.inputsUpdate[i].value = childNodes[i].innerHTML

			for ( let i = 0; i < 3; i++ )
				childNodes[i].style.display = 'none';
	
			this.inputsUpdate.style.display = ''
			parent.appendChild( this.inputsUpdate )
		} else {
			if ( this.lastParent )
				this.disableEditing()
		}
	}




	disableEditing() {
		const form = this.lastParent.childNodes[3]
		this.lastParent.removeChild( form )
		this.lastParent.childNodes.forEach( child => {
			child.style = ''
		} )
		this.lastParent.className = ''
		this.lastParent = null
	}




	disableEditLastParent( parent ) {
		if ( this.lastParent ) {
			const form = this.lastParent.childNodes[3]

			if ( form.localName == 'form' ) {
				this.lastParent.removeChild( form )
				this.lastParent.childNodes.forEach( child => {
					child.style = ''
				} )
			}

			this.lastParent.className = ''
		}

		parent.className = 'update'
		this.lastParent = parent
	}




	async submitUpdate( e ) {
		document.ondblclick = null
		e.preventDefault()

		const form = this.parentNode.parentNode
		const parent = this.environment.inputsUpdate.parentNode

		const formOk = this.environment.validateForm( form, parent )
		if ( formOk ) {
			parent.childNodes[3].style.display = 'none'
			parent.appendChild( this.environment.$imgLoading )

			const contact_id = form.parentNode.contact_id

			const formData = new FormData( form )
			formData.append( 'contact_id', contact_id )

			await new Promise( res => setTimeout( res, 1000 ) )

			const res = await fetch( 'php/update.php', {
				method: 'POST',
				body: formData
			} )

			if ( await res.text() == 'update ok' )
				this.environment.showUpdate()
		} else
			this.environment.disableEditing()

		document.ondblclick = this.environment.edit
	}




	validateForm( form, parent ) {
		// Is there modification ?
		let modification = false
		for ( let i = 0; i < 3; i++ ) {
			if ( form[i].value != parent.childNodes[i].innerHTML ) {
				modification = true
				break
			}
		}

		// Is the necessary information ?
		let emptyField = true
		for ( let i = 0; i < 2; i++ ) {
			if ( form[i].value == '' ) {
				emptyField = false
				break
			}
		}

		return modification && emptyField
	}




	showUpdate() {
		const parent = this.inputsUpdate.parentNode
		const form = parent.childNodes[3]

		for ( let i = 0; i < 3; i++ ) {
			let element = parent.childNodes[i]
			element.style.display = ''
			element.innerHTML = form[i].value
			element.className = element.innerHTML ? '' : 'empty'
		}

		parent.removeChild( parent.childNodes[3] )
		parent.removeChild( this.$imgLoading )
		parent.className = ''
		this.lastParent = null
	}
}




export { Update }