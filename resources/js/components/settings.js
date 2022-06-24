
class Settings {
    inputClass = ['w-full', 'py-3', 'text-black', 'bg-white', 'border-none', 'outline-none', 'focus:outline-none', 'focus:border-none', 'focus:shadow-none', 'focus:ring-transparent', 'job-name'];
    labelClass = ['text-gray-500', 'text-sm', 'font-semibold', 'flex', 'flex-col', 'gap-1']
    constructor() {
        this.stateNames = document.querySelectorAll('input.quote-state')
        this.stateColors = document.querySelectorAll('input.quote-color')
        this.jobNames = document.querySelectorAll('input.job-name')
        this.jobHandles = document.querySelectorAll('input.job-handle')
        this.deleteStates = document.querySelectorAll('button.delete-quote-state')
        this.addNewQuoteState = document.querySelector('button#new_quote_status')
        this.quoteStatesWrapper = document.querySelector('#quote_states_wrapper')
    }
    quoteStateDeleteTemplate = (id) => {
        let tmp = document.createElement("input");
        tmp.type = 'hidden'
        tmp.name = 'delete[states][]'
        tmp.value = id
        return tmp;
    }
    quoteStateAddTemplate = () => {

        let wrapper = document.createElement('div')
        wrapper.classList.add('mb-2', 'state-wrapper', 'gap-4', 'grid', 'grid-cols-[auto_180px_50px]')

        let labelInputState = document.createElement('label')
        labelInputState.classList.add(...this.labelClass)

        let inputState = document.createElement('input')
        inputState.type = 'text'
        inputState.classList.add(...this.inputClass)
        inputState.classList.add('quote-state')
        inputState.placeholder = 'Nazwa statusu'
        inputState.name = `states[${document.querySelectorAll('.state-wrapper').length + 1}][state]`
        labelInputState.append(inputState)
        wrapper.append(labelInputState)

        let labelInputColor = document.createElement('label')
        labelInputColor.classList.add(...this.labelClass)

        let inputColor = document.createElement('input')
        inputColor.type = 'text'
        inputColor.classList.add(...this.inputClass)
        inputColor.classList.add('quote-color')
        inputColor.placeholder = 'Kolor'
        inputColor.name = `states[${document.querySelectorAll('.state-wrapper').length + 1}][color]`
        labelInputColor.append(inputColor)
        wrapper.append(labelInputColor)

        let deleteButton = document.createElement('button')
        deleteButton.type = 'button'
        deleteButton.classList.add('h-full', 'px-3', 'mx-auto', 'text-sm', 'reverse', 'delete-quote-stat', 'btn-delete')
        deleteButton.innerHTML = 'Usuń'
        wrapper.append(deleteButton)
        deleteButton.addEventListener('click', e => {
            this.handleDeleteQuoteState(deleteButton)
        })

        this.quoteStatesWrapper.append(wrapper)
    }
    handleDeleteQuoteState = (el, existing = true) => {
        if (existing) {
            let id = el.dataset.quotestate_id;
            let removeTemplate = this.quoteStateDeleteTemplate(id);
            el.parentNode.after(removeTemplate)
        }
        el.parentNode.remove()
    }

    addListeners = () => {
        this.deleteStates.forEach(el => {
            el.addEventListener('click', e => {
                this.handleDeleteQuoteState(el)
            })
        })

        this.addNewQuoteState.addEventListener('click', e => {
            this.quoteStateAddTemplate()
        })
    }
    init = () => {
        if (this.deleteStates.length) {
            this.addListeners()
        }
    }
}

export default Settings;
