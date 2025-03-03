..  include:: /Includes.rst.txt
..  index:: Coding guidelines; Localization
..  _cgl-localization:

============
Localization
============

TYPO3 is designed to be fully localizable. Hard-coded strings should
thus be avoided unless there are some technical limitations (for example, some
very early or low-level stuff where a :ref:`$GLOBALS['LANG'] <LanguageService-api>`
object is not yet available).


Defining localized strings
==========================

Here are some rules to respect when working with labels in :file:`locallang`
files:

*   Always check the existing locallang files to see, if a given localized
    string already exists, in particular :t3src:`core/Resources/Private/Language/locallang_common.xlf`
    and :t3src:`core/Resources/Private/Language/locallang_core.xlf`.

*   Localized strings should never be all uppercase. If uppercase is needed,
    then appropriate methods should be used to transform them to uppercase.

*   Localized strings must not be split into several parts to include
    stuff in their middle. Rather use a single string with
    `sprintf() <https://www.php.net/manual/en/function.sprintf.php>`__
    markers (:code:`%s`, :code:`%d`, etc.).

*   When a localized string contains several :php:`sprintf()` markers, it
    **must** use numbered arguments (for example, :code:`%1$d`).

*   Localized strings should never contain configuration options (for example,
    :code:`index_config:timer_frequency`, which would display a link or
    :file:`EXT:wizard_crpages/cshimages/wizards_1.png`, which would show
    an image). Configuration like this does not belong in language
    labels, but in TypoScript.

*   Localized strings are not supposed to contain HTML tags. They should
    be avoided whenever possible.

*   Punctuation marks must be included in the localized string –
    including trailing marks – as different punctuation marks (for example, "?"
    and "¿") may be used in various languages. Also some languages include
    blanks before some punctuation marks.

Once a localized string appears in a released version of TYPO3, it
cannot be changed (unless it needs grammar or spelling fixes). Nor can
it be removed. If the label of a localized string has to be changed, a
new one should be introduced instead.
