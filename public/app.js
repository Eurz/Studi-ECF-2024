function addFormToCollection(e) {
    console.log(e.currentTarget)
    const collectionHolder = document.querySelector(
        '.' + e.currentTarget.dataset.collectionHolderClass
    )
    const item = document.createElement('div')

    item.innerHTML = collectionHolder.dataset.prototype.replace(
        /__new_photo__/g,
        collectionHolder.dataset.index
    )

    collectionHolder.appendChild(item)

    addTagFormDeleteLink(item)
    // updateButtons()
    collectionHolder.dataset.index++
}

// function updateButtons() {
//     const buttons = document.querySelectorAll('.add_note_action')
//     if (!buttons) {
//         return
//     }

//     buttons.forEach((btn) => {
//         btn.removeEventListener('click', addFormToCollection)
//         btn.innerText = 'Save'
//         btn.classList.remove('add_note_action')
//         btn.classList.add('save_task_action')
//         btn.addEventListener('click', saveTask)
//     })
// }

function saveTask(e) {
    const button = e.target
    const form = button.closest('form')
    // updateButtons()

    document.querySelectorAll('.save_task_action').forEach((btn) => {
        btn.removeEventListener('click', addTagFormDeleteLink)
        btn.setAttribute('disabled', 'disabled')
        btn.classList.add('bg-danger')
        btn.innerText = '...Updating'
    })

    form.submit()
}

function addTagFormDeleteLink(item) {
    const removeFormButton = document.createElement('button')
    removeFormButton.classList.add('btn', 'btn-primary')
    removeFormButton.innerText = 'Supprimer'

    item.append(removeFormButton)

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault()
        item.remove()
    })
}

// document.querySelectorAll('div.tags .test').forEach((note) => {
//     addTagFormDeleteLink(note)
// })

// document
//     .querySelector('.add_note_action')
//     .addEventListener('click', addFormToCollection)

document.querySelectorAll('.add_note_action').forEach((btn) => {
    btn.addEventListener('click', addFormToCollection)
})
// document.querySelectorAll('.save_task_action').forEach((btn) => {
//     btn.addEventListener('click', saveTask)
// })
