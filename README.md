# Typo3 Extension Accordion

## What does it do?

This extension adds a content-element to display an simple accordion or tab-menu in the frontend.

## Installation

... like any other TYPO3 extension [extensions.typo3.org](https://extensions.typo3.org/extension/hh_video_extender/ "TYPO3 Extension Repository")

In addition: Include Page Config
    - Switch to the root page of your site.
    - Edit page properties
    - Switch to tab **Resources**
    - Select **EXT:hh_accordion :: Hauer-Heinrich - Accordion Page TS**

### Features
- accordion or tab-menu switch button
- try's to be accessible / barrier free
- you can set the allowed CType(s) for the inline/irre field content-elements via TypoScript (default: 'all') e. g.
    ```
    tt_content.hhaccordion_hh_accordion {
        settings {
            allowedCtypes = textmedia,text,image,textpic,uploads
        }
    }
    ```

#### Constants Editor
Include tab CSS with styles/layout for accordion:
plugin.tx_hhaccordion.settings.cssFileStyleAccordion = 0 or the provided theme (e.g. accordion_default)

Include tab CSS with styles/layout for tabs:
plugin.tx_hhaccordion.settings.cssFileStyleTabs = 0 or the provided theme (e.g. tabs_default)

#hash/history function:
plugin.tx_hhaccordion.settings.jsFileAccordion = 0 or 1

Include "tab" JavaScript file (necessary for function!):
plugin.tx_hhaccordion.settings.jsFileTabs = 0 or 1


##### License
----
MIT
