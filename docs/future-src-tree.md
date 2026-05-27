src
├── app
│   ├── app.config.ts
│   ├── app.routes.ts
│   ├── app.ts
│   ├── config
│   │   ├── datepicker-adapter.ts
│   │   ├── dayjs.ts
│   │   ├── input.constants.ts
│   │   ├── navigation.constants.ts
│   │   ├── pagination.constants.ts
│   │   └── translation.config.ts
│   ├── core
│   │   ├── auth
│   │   │   ├── account.service.ts
│   │   │   ├── auth.service.ts
│   │   │   ├── auto-login.service.ts
│   │   │   └── state-storage.service.ts
│   │   ├── config
│   │   │   └── application-config.service.ts
│   │   ├── guards
│   │   │   ├── public-auth.guard.ts
│   │   │   └── terms-acceptance.guard.ts
│   │   ├── interceptor
│   │   │   ├── auth-expired.interceptor.ts
│   │   │   ├── auth.interceptor.ts
│   │   │   ├── error-handler.interceptor.ts
│   │   │   ├── index.ts
│   │   │   └── notification.interceptor.ts
│   │   ├── language
│   │   │   ├── language.model.ts
│   │   │   └── language.service.ts
│   │   ├── request
│   │   │   ├── request-util.ts
│   │   │   └── request.model.ts
│   │   ├── util
│   │   │   ├── alert.service.ts
│   │   │   └── event-manager.service.ts
│   │   └── websocket
│   │   └── notify.service.ts
│   ├── landing-pages
│   │   ├── contact
│   │   │   ├── contact.html
│   │   │   ├── contact.scss
│   │   │   └── contact.ts
│   │   ├── landing-pages.route.ts
│   │   ├── news
│   │   │   ├── components
│   │   │   │   ├── news-detail
│   │   │   │   │   ├── news-detail.html
│   │   │   │   │   ├── news-detail.scss
│   │   │   │   │   └── news-detail.ts
│   │   │   │   └── news-list
│   │   │   │   ├── news-list.html
│   │   │   │   ├── news-list.scss
│   │   │   │   └── news-list.ts
│   │   │   ├── model
│   │   │   │   └── news.model.ts
│   │   │   ├── news.routes.ts
│   │   │   └── service
│   │   │   ├── news-detail.resolver.ts
│   │   │   └── news.service.ts
│   │   └── static-page
│   │   ├── detail
│   │   │   ├── static-page-detail.html
│   │   │   ├── static-page-detail.scss
│   │   │   └── static-page-detail.ts
│   │   ├── model
│   │   │   └── static-page.model.ts
│   │   ├── route
│   │   │   ├── static-page.resolver.ts
│   │   │   └── static-page.routes.ts
│   │   └── service
│   │   ├── static-page-menu.service.ts
│   │   └── static-page.service.ts
│   ├── layout
│   │   ├── app-layout
│   │   │   ├── app-layout.html
│   │   │   ├── app-layout.scss
│   │   │   └── app-layout.ts
│   │   ├── footer
│   │   │   ├── footer.html
│   │   │   ├── footer.scss
│   │   │   └── footer.ts
│   │   ├── mobile-bottom-nav
│   │   │   ├── mobile-bottom-nav.html
│   │   │   ├── mobile-bottom-nav.scss
│   │   │   └── mobile-bottom-nav.ts
│   │   └── navbar
│   │   ├── navbar.html
│   │   ├── navbar.scss
│   │   └── navbar.ts
│   ├── pages
│   │   ├── account
│   │   │   ├── account.route.ts
│   │   │   ├── model
│   │   │   │   ├── account-register.model.ts
│   │   │   │   └── account.model.ts
│   │   │   ├── profile
│   │   │   │   ├── profile.html
│   │   │   │   ├── profile.scss
│   │   │   │   └── profile.ts
│   │   │   └── settings
│   │   │   ├── crypto-address
│   │   │   │   ├── crypto-address-route.ts
│   │   │   │   ├── form
│   │   │   │   │   ├── crypto-address-form.html
│   │   │   │   │   ├── crypto-address-form.scss
│   │   │   │   │   └── crypto-address-form.ts
│   │   │   │   ├── list
│   │   │   │   │   ├── crypto-address-list.html
│   │   │   │   │   ├── crypto-address-list.scss
│   │   │   │   │   └── crypto-address-list.ts
│   │   │   │   ├── model
│   │   │   │   │   └── crypto-address.model.ts
│   │   │   │   └── service
│   │   │   │   └── crypto-address.service.ts
│   │   │   ├── language
│   │   │   │   ├── language-settings.html
│   │   │   │   ├── language-settings.scss
│   │   │   │   └── language-settings.ts
│   │   │   ├── layout
│   │   │   │   ├── settings-layout.html
│   │   │   │   ├── settings-layout.scss
│   │   │   │   └── settings-layout.ts
│   │   │   ├── login-methods
│   │   │   │   ├── login-methods.html
│   │   │   │   ├── login-methods.scss
│   │   │   │   ├── login-methods.ts
│   │   │   │   ├── password-config
│   │   │   │   │   ├── password-config.html
│   │   │   │   │   ├── password-config.scss
│   │   │   │   │   └── password-config.ts
│   │   │   │   ├── telegram-config
│   │   │   │   │   ├── telegram-config.html
│   │   │   │   │   ├── telegram-config.scss
│   │   │   │   │   └── telegram-config.ts
│   │   │   │   └── whatsapp-config
│   │   │   │   ├── whatsapp-config.html
│   │   │   │   └── whatsapp-config.ts
│   │   │   ├── notifications
│   │   │   │   ├── notification-settings.html
│   │   │   │   ├── notification-settings.scss
│   │   │   │   └── notification-settings.ts
│   │   │   ├── profile
│   │   │   │   ├── profile-edit.html
│   │   │   │   ├── profile-edit.scss
│   │   │   │   └── profile-edit.ts
│   │   │   └── route
│   │   │   └── public-settings.routes.ts
│   │   ├── auth
│   │   │   ├── auth.html
│   │   │   ├── auth.scss
│   │   │   ├── auth.ts
│   │   │   ├── forgot-password
│   │   │   │   ├── forgot-password.html
│   │   │   │   └── forgot-password.ts
│   │   │   ├── layout
│   │   │   │   ├── auth-wrapper.html
│   │   │   │   ├── auth-wrapper.scss
│   │   │   │   └── auth-wrapper.ts
│   │   │   ├── model
│   │   │   │   └── auth.model.ts
│   │   │   ├── otp-verification
│   │   │   │   ├── otp-verification.html
│   │   │   │   └── otp-verification.ts
│   │   │   └── register
│   │   │   ├── register.html
│   │   │   ├── register.scss
│   │   │   └── register.ts
│   │   ├── chat
│   │   │   ├── chat.routes.ts
│   │   │   ├── components
│   │   │   │   ├── chat-window
│   │   │   │   │   ├── chat-window.component.html
│   │   │   │   │   └── chat-window.component.ts
│   │   │   │   ├── conversation-list
│   │   │   │   │   ├── conversation-list.component.html
│   │   │   │   │   ├── conversation-list.component.scss
│   │   │   │   │   └── conversation-list.component.ts
│   │   │   │   └── new-conversation
│   │   │   │   ├── new-conversation.html
│   │   │   │   └── new-conversation.ts
│   │   │   ├── models
│   │   │   │   ├── conversation.model.ts
│   │   │   │   ├── index.ts
│   │   │   │   ├── message.model.ts
│   │   │   │   ├── report.model.ts
│   │   │   │   └── user-block.model.ts
│   │   │   └── services
│   │   │   ├── chat-api.service.ts
│   │   │   ├── chat-websocket.service.ts
│   │   │   └── index.ts
│   │   ├── dashboard
│   │   │   ├── components
│   │   │   │   ├── balance
│   │   │   │   │   ├── balance.html
│   │   │   │   │   └── balance.ts
│   │   │   │   ├── investments
│   │   │   │   │   ├── investments.html
│   │   │   │   │   ├── investments.scss
│   │   │   │   │   └── investments.ts
│   │   │   │   ├── project-price-chart
│   │   │   │   │   ├── project-price-chart.html
│   │   │   │   │   ├── project-price-chart.scss
│   │   │   │   │   └── project-price-chart.ts
│   │   │   │   └── referrals
│   │   │   │   ├── referrals.html
│   │   │   │   └── referrals.ts
│   │   │   ├── dashboard.html
│   │   │   ├── dashboard.scss
│   │   │   ├── dashboard.ts
│   │   │   └── model
│   │   │   └── project-price-chart.model.ts
│   │   ├── financial-report
│   │   │   ├── financial-report.html
│   │   │   ├── financial-report.scss
│   │   │   ├── financial-report.ts
│   │   │   ├── model
│   │   │   │   └── financial-report.model.ts
│   │   │   └── service
│   │   │   └── financial-report.service.ts
│   │   ├── home
│   │   │   ├── home.html
│   │   │   ├── home.ts
│   │   │   └── sections
│   │   │   ├── committee
│   │   │   │   ├── committee.html
│   │   │   │   ├── committee.scss
│   │   │   │   ├── committee.ts
│   │   │   │   ├── model
│   │   │   │   │   └── supervisory-committee.model.ts
│   │   │   │   └── service
│   │   │   │   └── supervisory-committee.service.ts
│   │   │   ├── cta
│   │   │   │   ├── cta.html
│   │   │   │   ├── cta.scss
│   │   │   │   └── cta.ts
│   │   │   ├── faq
│   │   │   │   ├── faq.html
│   │   │   │   ├── faq.scss
│   │   │   │   ├── faq.ts
│   │   │   │   ├── model
│   │   │   │   │   └── faq.model.ts
│   │   │   │   └── service
│   │   │   │   └── faq.service.ts
│   │   │   ├── hero
│   │   │   │   ├── hero.html
│   │   │   │   ├── hero.scss
│   │   │   │   └── hero.ts
│   │   │   ├── news
│   │   │   │   ├── news.html
│   │   │   │   ├── news.scss
│   │   │   │   └── news.ts
│   │   │   ├── referral
│   │   │   │   ├── referral.html
│   │   │   │   ├── referral.scss
│   │   │   │   └── referral.ts
│   │   │   ├── stats-band
│   │   │   │   ├── stats-band.html
│   │   │   │   ├── stats-band.scss
│   │   │   │   └── stats-band.ts
│   │   │   ├── tech
│   │   │   │   ├── tech.html
│   │   │   │   ├── tech.scss
│   │   │   │   └── tech.ts
│   │   │   └── why-now
│   │   │   ├── why-now.html
│   │   │   ├── why-now.scss
│   │   │   └── why-now.ts
│   │   ├── installment
│   │   │   ├── model
│   │   │   │   └── installment.model.ts
│   │   │   └── service
│   │   │   └── installment.service.ts
│   │   ├── investments
│   │   │   ├── contracts
│   │   │   │   ├── investment-contracts.html
│   │   │   │   ├── investment-contracts.scss
│   │   │   │   └── investment-contracts.ts
│   │   │   ├── investments.html
│   │   │   ├── investments.ts
│   │   │   ├── model
│   │   │   │   └── portfolio.model.ts
│   │   │   └── service
│   │   │   └── portfolio.service.ts
│   │   ├── kyc
│   │   │   ├── banner
│   │   │   │   ├── kyc-banner.html
│   │   │   │   ├── kyc-banner.scss
│   │   │   │   └── kyc-banner.ts
│   │   │   ├── kyc.model.ts
│   │   │   ├── kyc.service.ts
│   │   │   └── verification
│   │   │   ├── kyc-verification.html
│   │   │   ├── kyc-verification.scss
│   │   │   └── kyc-verification.ts
│   │   ├── notification
│   │   │   ├── model
│   │   │   │   ├── notification.model.ts
│   │   │   │   └── user-notification.model.ts
│   │   │   ├── notifications.component.html
│   │   │   ├── notifications.component.scss
│   │   │   ├── notifications.component.ts
│   │   │   └── service
│   │   │   └── user-notification.service.ts
│   │   ├── pages.routes.ts
│   │   ├── project
│   │   │   ├── model
│   │   │   │   └── project.model.ts
│   │   │   └── service
│   │   │   ├── project-data.service.ts
│   │   │   └── project.service.ts
│   │   ├── referral
│   │   │   ├── components
│   │   │   │   ├── referral-table.html
│   │   │   │   ├── referral-table.scss
│   │   │   │   └── referral-table.ts
│   │   │   ├── model
│   │   │   │   └── referral.model.ts
│   │   │   ├── referral.html
│   │   │   ├── referral.scss
│   │   │   ├── referral.ts
│   │   │   └── service
│   │   │   └── referral.service.ts
│   │   ├── share-purchase
│   │   │   ├── model
│   │   │   │   └── share-purchase.model.ts
│   │   │   └── service
│   │   │   └── share-purchase.service.ts
│   │   ├── terms-acceptance
│   │   │   ├── terms-acceptance.html
│   │   │   ├── terms-acceptance.scss
│   │   │   └── terms-acceptance.ts
│   │   ├── transactions
│   │   │   ├── model
│   │   │   │   └── wallet-transaction.model.ts
│   │   │   └── service
│   │   │   └── wallet-transaction.service.ts
│   │   ├── transfer
│   │   │   ├── model
│   │   │   │   └── transfer.model.ts
│   │   │   └── service
│   │   │   └── transfer.service.ts
│   │   ├── wallet
│   │   │   ├── deposit
│   │   │   │   ├── deposit.html
│   │   │   │   ├── deposit.scss
│   │   │   │   ├── deposit.ts
│   │   │   │   ├── fail
│   │   │   │   │   ├── fail-deposit.html
│   │   │   │   │   ├── fail-deposit.scss
│   │   │   │   │   └── fail-deposit.ts
│   │   │   │   └── success
│   │   │   │   ├── success-deposit.html
│   │   │   │   ├── success-deposit.scss
│   │   │   │   └── success-deposit.ts
│   │   │   ├── modal
│   │   │   │   └── transfer-funds
│   │   │   │   ├── transfer-funds.html
│   │   │   │   └── transfer-funds.ts
│   │   │   ├── model
│   │   │   │   ├── payment-provider.model.ts
│   │   │   │   ├── payment.model.ts
│   │   │   │   └── wallet.model.ts
│   │   │   ├── my
│   │   │   │   ├── payment-transactions
│   │   │   │   │   ├── payment-transactions.html
│   │   │   │   │   ├── payment-transactions.scss
│   │   │   │   │   └── payment-transactions.ts
│   │   │   │   ├── wallet-transactions
│   │   │   │   │   ├── wallet-transactions.html
│   │   │   │   │   └── wallet-transactions.ts
│   │   │   │   ├── wallet.html
│   │   │   │   ├── wallet.scss
│   │   │   │   └── wallet.ts
│   │   │   ├── route
│   │   │   │   ├── deposit-response-routing-resolve.service.ts
│   │   │   │   ├── wallet-routing-resolve.service.ts
│   │   │   │   └── wallet.routes.ts
│   │   │   └── service
│   │   │   ├── payment-provider.service.ts
│   │   │   ├── payment.service.ts
│   │   │   └── wallet.service.ts
│   │   └── withdrawal
│   │   ├── components
│   │   │   ├── verify-withdrawal-otp
│   │   │   │   ├── verify-withdrawal-otp.html
│   │   │   │   ├── verify-withdrawal-otp.scss
│   │   │   │   └── verify-withdrawal-otp.ts
│   │   │   └── withdrawal-transactions
│   │   │   ├── withdrawal-transactions.html
│   │   │   ├── withdrawal-transactions.scss
│   │   │   └── withdrawal-transactions.ts
│   │   ├── create
│   │   │   ├── create-withdrawal.html
│   │   │   ├── create-withdrawal.scss
│   │   │   └── create-withdrawal.ts
│   │   ├── list
│   │   │   ├── withdrawal-list.html
│   │   │   ├── withdrawal-list.scss
│   │   │   └── withdrawal-list.ts
│   │   ├── model
│   │   │   └── withdrawal.model.ts
│   │   ├── service
│   │   │   └── withdrawal.service.ts
│   │   └── withdrawal.routes.ts
│   └── shared
│   ├── app-page-title-strategy.ts
│   ├── components
│   │   ├── auth-strength
│   │   │   ├── auth-strength.component.html
│   │   │   ├── auth-strength.component.scss
│   │   │   └── auth-strength.component.ts
│   │   ├── c-stepper
│   │   │   ├── c-stepper.component.html
│   │   │   ├── c-stepper.component.scss
│   │   │   └── c-stepper.component.ts
│   │   ├── chat-absolute-actions
│   │   │   ├── chat-absolute-actions.html
│   │   │   ├── chat-absolute-actions.scss
│   │   │   └── chat-absolute-actions.ts
│   │   ├── countries
│   │   │   ├── countries.html
│   │   │   ├── countries.ts
│   │   │   ├── country.model.ts
│   │   │   └── country.service.ts
│   │   ├── document-type
│   │   │   ├── document-type.html
│   │   │   └── document-type.ts
│   │   ├── empty-state
│   │   │   ├── empty-state-card.html
│   │   │   ├── empty-state-card.scss
│   │   │   └── empty-state-card.ts
│   │   ├── investment-tabs
│   │   │   └── investment-tabs.component.ts
│   │   ├── language-toggler
│   │   │   ├── language-toggler.html
│   │   │   ├── language-toggler.scss
│   │   │   └── language-toggler.ts
│   │   ├── loading-data
│   │   │   ├── loading-data.html
│   │   │   ├── loading-data.scss
│   │   │   └── loading-data.ts
│   │   ├── login-code
│   │   │   ├── login-code.html
│   │   │   ├── login-code.scss
│   │   │   └── login-code.ts
│   │   ├── modal
│   │   │   ├── cancel-contract
│   │   │   │   ├── cancel-contract-dialog.html
│   │   │   │   └── cancel-contract-dialog.ts
│   │   │   ├── crypto
│   │   │   │   ├── crypto-address-delete
│   │   │   │   │   ├── crypto-address-delete-dialog.html
│   │   │   │   │   ├── crypto-address-delete-dialog.scss
│   │   │   │   │   └── crypto-address-delete-dialog.ts
│   │   │   │   ├── crypto-address-set-default
│   │   │   │   │   ├── crypto-address-set-default.html
│   │   │   │   │   ├── crypto-address-set-default.scss
│   │   │   │   │   └── crypto-address-set-default.ts
│   │   │   │   └── crypto-address-verify-otp-dialog
│   │   │   │   ├── crypto-address-verify-otp-dialog.html
│   │   │   │   ├── crypto-address-verify-otp-dialog.scss
│   │   │   │   └── crypto-address-verify-otp-dialog.ts
│   │   │   ├── insufficient-funds-dialog
│   │   │   │   ├── insufficient-funds-dialog.html
│   │   │   │   ├── insufficient-funds-dialog.scss
│   │   │   │   └── insufficient-funds-dialog.ts
│   │   │   ├── pay-contract-months-dialog
│   │   │   │   ├── pay-contract-months-dialog.html
│   │   │   │   └── pay-contract-months-dialog.ts
│   │   │   ├── payment-confirm-dialog
│   │   │   │   ├── payment-confirm-dialog.html
│   │   │   │   └── payment-confirm-dialog.ts
│   │   │   ├── share-purchase-confirm
│   │   │   │   ├── share-purchase-confirm-dialog.html
│   │   │   │   ├── share-purchase-confirm-dialog.scss
│   │   │   │   └── share-purchase-confirm-dialog.ts
│   │   │   ├── supervisor-request
│   │   │   │   ├── supervisor-request-dialog.html
│   │   │   │   ├── supervisor-request-dialog.scss
│   │   │   │   └── supervisor-request-dialog.ts
│   │   │   └── withdraw
│   │   │   ├── withdrawal-detail-dialog
│   │   │   │   ├── withdrawal-detail-dialog.html
│   │   │   │   ├── withdrawal-detail-dialog.scss
│   │   │   │   └── withdrawal-detail-dialog.ts
│   │   │   └── withdrawal-verify-dialog
│   │   │   ├── withdrawal-verify-dialog.html
│   │   │   ├── withdrawal-verify-dialog.scss
│   │   │   └── withdrawal-verify-dialog.ts
│   │   ├── no-data
│   │   │   ├── no-data.html
│   │   │   └── no-data.ts
│   │   ├── notification-counter
│   │   │   ├── notification-counter.html
│   │   │   ├── notification-counter.scss
│   │   │   └── notification-counter.ts
│   │   ├── notifications-aside
│   │   │   ├── notifications-drawer.component.html
│   │   │   ├── notifications-drawer.component.scss
│   │   │   └── notifications-drawer.component.ts
│   │   ├── responsive-table
│   │   │   └── responsive-table.ts
│   │   ├── theme-toggler
│   │   │   ├── theme-toggle.html
│   │   │   ├── theme-toggle.scss
│   │   │   └── theme-toggle.ts
│   │   ├── warning-banner
│   │   │   ├── warning-banner.html
│   │   │   ├── warning-banner.scss
│   │   │   └── warning-banner.ts
│   │   └── warning-otp
│   │   ├── warning-otp.html
│   │   └── warning-otp.ts
│   ├── directives
│   │   ├── active-menu.directive.ts
│   │   ├── classifiers.helper.ts
│   │   ├── date
│   │   │   ├── duration.pipe.ts
│   │   │   ├── format-adjustable-datetime.pipe.ts
│   │   │   ├── format-local-datetime.pipe.ts
│   │   │   ├── format-medium-date.pipe.ts
│   │   │   ├── format-medium-datetime.pipe.ts
│   │   │   ├── format-standart-date.pipe.ts
│   │   │   ├── format-standart-datetime.pipe.ts
│   │   │   ├── index.ts
│   │   │   ├── postgres-interval-input.directive.ts
│   │   │   └── postgres-interval.pipe.ts
│   │   ├── global.constants.ts
│   │   ├── input
│   │   │   ├── input-restrict-type.directive.ts
│   │   │   ├── letter-only.directive.ts
│   │   │   ├── only-number.directive.ts
│   │   │   ├── replace-0-value.directive.ts
│   │   │   ├── trim-spaces-and-uppercase.directive.ts
│   │   │   └── trim-spaces.directive.ts
│   │   ├── language
│   │   │   ├── find-language-from-key.pipe.ts
│   │   │   ├── index.ts
│   │   │   ├── translate.directive.ts
│   │   │   └── translation.module.ts
│   │   ├── level-badge.pipe.ts
│   │   ├── minimum-age-validator.ts
│   │   ├── password-match-validator.ts
│   │   ├── phone-remove-plus-placeholder.ts
│   │   └── pretty-json
│   │   ├── pretty-json.directive.ts
│   │   └── pretty-json.pipe.ts
│   ├── enumerations
│   │   ├── audit-log
│   │   │   ├── audit-action-type.model.ts
│   │   │   ├── audit-log-operation.model.ts
│   │   │   ├── audit-log-process.model.ts
│   │   │   ├── audit-log-status.model.ts
│   │   │   ├── data-source.model.ts
│   │   │   ├── hash-algorithm.model.ts
│   │   │   ├── hash-integrity-status.model.ts
│   │   │   ├── log-category.model.ts
│   │   │   ├── log-event-severity.model.ts
│   │   │   ├── object-type.model.ts
│   │   │   ├── retention-policy-type.model.ts
│   │   │   └── search-scope.model.ts
│   │   ├── document-type.enum.ts
│   │   ├── installment-plan-status.enum.ts
│   │   ├── kyc-level.model.ts
│   │   ├── notification
│   │   │   ├── delivery-channel.model.ts
│   │   │   ├── delivery-status.model.ts
│   │   │   ├── multipleselection.model.ts
│   │   │   ├── notification-priority.model.ts
│   │   │   ├── notification-receiver.model.ts
│   │   │   ├── notification-source.model.ts
│   │   │   └── notification-type.model.ts
│   │   ├── notification-channel.model.ts
│   │   ├── payment-method.model.ts
│   │   ├── payment-provider.model.ts
│   │   ├── payment-status.model.ts
│   │   ├── purchase-status.enum.ts
│   │   ├── purchase-type.enum.ts
│   │   ├── reference-type.model.ts
│   │   ├── supervisor-status.enum.ts
│   │   ├── transaction-type.model.ts
│   │   ├── user-status.enum.ts
│   │   ├── wallet-blocked-reason.enum.ts
│   │   └── wallet-status.model.ts
│   ├── helpers
│   │   ├── document-helper.ts
│   │   ├── patch-phone-object.ts
│   │   └── puchase-settings.parser.ts
│   ├── model
│   │   ├── account.model.ts
│   │   ├── auto-login.model.ts
│   │   ├── business-event-type.model.ts
│   │   ├── configurations.model.ts
│   │   ├── purchase-settings-config.model.ts
│   │   └── social-link.model.ts
│   ├── query
│   │   ├── base-query.builder.ts
│   │   ├── operator.model.ts
│   │   └── query.builder.ts
│   ├── services
│   │   ├── color-scheme.service.ts
│   │   ├── configurations.service.ts
│   │   ├── country-storage.service.ts
│   │   ├── file-downloader.service.ts
│   │   ├── layout.service.ts
│   │   ├── meta
│   │   │   ├── meta.resolver.ts
│   │   │   └── meta.service.ts
│   │   ├── ng-select-scroll-service.ts
│   │   ├── pagination.service.ts
│   │   ├── row-selection.service.ts
│   │   ├── structured-data.service.ts
│   │   └── window-resize.service.ts
│   ├── sort
│   │   ├── index.ts
│   │   ├── sort-by.directive.ts
│   │   ├── sort-state.ts
│   │   ├── sort.directive.ts
│   │   └── sort.service.ts
│   └── validators
│   └── password-policy.validators.ts
├── declarations.d.ts
├── environments
│   ├── environment.development.ts
│   └── environment.ts
├── i18n
└── en
│   │   ├── alertAction.json
│   │   ├── alertSeverity.json
│   │   ├── alertStatus.json
│   │   ├── alerts.json
│   │   ├── auth.json
│   │   ├── boolean-status.json
│   │   ├── channelType.json
│   │   ├── chat.json
│   │   ├── contact.json
│   │   ├── cookieConsent.json
│   │   ├── cryptoAddress.json
│   │   ├── dashboard.json
│   │   ├── deposit.json
│   │   ├── documentType.json
│   │   ├── error.json
│   │   ├── faq.json
│   │   ├── financialReport.json
│   │   ├── footer.json
│   │   ├── forgotPassword.json
│   │   ├── global.json
│   │   ├── home.json
│   │   ├── installmentContractStatus.json
│   │   ├── installmentPlanStatus.json
│   │   ├── investments.json
│   │   ├── kyc.json
│   │   ├── kycLevel.json
│   │   ├── months.json
│   │   ├── news.json
│   │   ├── notifications.json
│   │   ├── pages.json
│   │   ├── paymentMethod.json
│   │   ├── paymentProvider.json
│   │   ├── paymentStatus.json
│   │   ├── paymentTransaction.json
│   │   ├── placeholder.json
│   │   ├── profile.json
│   │   ├── purchaseHistory.json
│   │   ├── purchaseStatus.json
│   │   ├── purchaseType.json
│   │   ├── referenceType.json
│   │   ├── referral.json
│   │   ├── register.json
│   │   ├── reset.json
│   │   ├── sharePurchase.json
│   │   ├── supervisorStatus.json
│   │   ├── supervisoryCommittee.json
│   │   ├── terms.json
│   │   ├── transactionType.json
│   │   ├── transferStatus.json
│   │   ├── transferType.json
│   │   ├── userManagement.json
│   │   ├── userNotifications.json
│   │   ├── userRoles.json
│   │   ├── userStatus.json
│   │   ├── wallet.json
│   │   ├── walletStatus.json
│   │   ├── walletTransaction.json
│   │   └── withdraw.json
├── index.html
├── main.ts
├── polyfills.ts
├── sitemap.xml
└── styles
├── scss
│   ├── components
│   │   ├── \_buttons.scss
│   │   ├── \_cards.scss
│   │   ├── \_home-variables.scss
│   │   ├── \_icons.scss
│   │   ├── \_input.scss
│   │   ├── \_layout.scss
│   │   ├── \_notifications.scss
│   │   └── \_table.scss
│   ├── fonts.scss
│   ├── global.scss
│   ├── vendor.scss
│   └── webfonts
│   ├── fa-brands-400.eot
│   ├── fa-brands-400.woff
│   ├── fa-brands-400.woff2
│   ├── fa-regular-400.eot
│   ├── fa-regular-400.svg
│   ├── fa-regular-400.ttf
│   ├── fa-regular-400.woff
│   ├── fa-regular-400.woff2
│   ├── fa-solid-900.eot
│   ├── fa-solid-900.svg
│   ├── fa-solid-900.ttf
│   ├── fa-solid-900.woff
│   └── fa-solid-900.woff2
└── theme
├── demo
│   ├── code.scss
│   ├── demo.scss
│   └── flags
│   ├── flags.scss
│   └── flags_responsive.png
├── layout
│   ├── \_core.scss
│   ├── \_dark.scss
│   ├── \_main.scss
│   ├── \_topbar.scss
│   ├── \_typography.scss
│   ├── \_utils.scss
│   ├── layout.scss
│   └── variables
│   └── \_common.scss
└── styles.scss

218 directories, 1779 files
