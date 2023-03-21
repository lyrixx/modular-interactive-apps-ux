import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        premiumQuantity: Number,
    };

    static targets = [
        'quantity',
    ];

    requestSubmit() {
        this.element.requestSubmit();
    }
    requestDiscount() {
        this.quantityTarget.value = this.premiumQuantityValue;
    }
}
