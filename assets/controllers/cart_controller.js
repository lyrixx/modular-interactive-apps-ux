import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static values = {
        discountStartAtQuantity: Number
    };

    static targets = ['quantity'];

    connect() {
        // this.quantityTarget.addEventListener('change', () => {
        //     this.element.requestSubmit();
        // });
    };

    updateQuantity() {
        this.element.requestSubmit();
    };

    iWantTheDiscount() {
        this.quantityTarget.value = this.discountStartAtQuantityValue;
        this.element.requestSubmit();
    };
}
