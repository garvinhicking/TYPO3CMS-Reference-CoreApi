.. include:: /Includes.rst.txt

.. _knownissues:

============================================================
Frequently Asked Questions (FAQ) and known issues / problems
============================================================

.. _knownissues_overview:

..  note::
    This document is work in progress. Suggestions and contributions are very
    welcome by adding pull requests to this page, see `Edit on GitHub` at the
    top of this page.

The TYPO3 system is a very large, living Open Source Project with many
functionalities and dependencies gathered along the many years it has been
active.

It is a huge effort of the TYPO3 community to both support functionality,
that has always been there ("legacy code"), as well as new features.

This document aims to be an up-to-date starting point for anyone, who
needs to have information about:

*   Are there any known **breaking issues** in currently supported TYPO3
    versions that affect a **broader range of users**?
*   Are there any new **important bugfixes** (or regression fixes) in
    the most recent TYPO3 release?
*   Are there any new **features** that have **usage restrictions** or
    require **workarounds**?
*   Am I affected by any of these issues and **can offer aid** with
    **development or testing**?
*   Which problems or issues are **very frequently asked** on support channels
    like *Slack*  or *StackOverflow* and can be solved with a lead to
    more information?

..  seealso::

    *   `Tracking issues at forge.typo3.org <https://forge.typo3.org>`__
    *   `Security Bulletins <https://typo3.org/help/security-advisories>`__
    *   `Ask the community at slack <https://my.typo3.org/about-mytypo3org/slack>`__
    *   `Ask at Stack Overflow <https://stackoverflow.com/search?q=typo3>`__

.. _knownissues_breakingissues:

Known Issues / Known problems
=============================

The list below is meant to address issues that affect a broader or common
pool of TYPO3 installations. It is not meant to replace the
`Issue-Tracker at forge.typo3.org <https://forge.typo3.org>`__ where you
can report new issues, or address existing specific issues.

.. _t3v11_issues:

TYPO3 11 LTS
============

*   Currently no issues in the scope of this document are known in TYPO3 11 LTS.


.. _t3v12_issues:

TYPO3 12 LTS
============

*   When using a composer-mode installation inside a sub-directory
    of a webserver's document root, several errors for unresolvable
    assets or files can happen in the TYPO3 backend. Generally, because out
    of security considerations, it is not a good idea to map TYPO3's
    composer public web directory in a subdirectory of a DocumentRoot,
    because it can expose configuration and other files through the
    webserver. So if possible, try to *not* set-up an installation this way.

    This issue is tracked as
    `#101911 <https://forge.typo3.org/issues/101911>`__

*   When using TYPO3 on a webserver that has PHP's :php:`open_basedir`
    directive enabled, several assets or files in the backend may not be
    resolved properly and show errors/exceptions. Other than disabling
    the :php:`open_basedir` directive there is no currently known workaround.

    This issue is tracked as `#98545 <https://forge.typo3.org/issues/98545>`__


.. _knownissues_recentfixes:

Recent important fixes
======================

.. _t3v11_recentfixes:

TYPO3 11 LTS
============

*   Currently no important fixes listed for the recent TYPO3 11 LTS release.


.. _t3v12_recentfixes:

TYPO3 12 LTS
============

*   **12.4.6** made :html:`<f:link.action>` and
    :html:`<f:uri.action>` work without Extbase easier (as an interim solution).
  *   `2023-09-08 9da08034dc [TASK] Allow f:link.action and f:uri.action without
       Extbase <https://github.com/typo3/typo3/commit/9da08034dc>`__
*   **12.4.6** improved CKEditor v5 integration:
  *   `2023-09-07 078de3a2f8 [TASK] Restore "ShowBlocks" functionality in CKEditor5 <https://github.com/typo3/typo3/commit/078de3a2f8>`__
  *   `2023-08-30 d7d3f6fd04 [TASK] Update CKEditor5 to use DocumentList instead of List <https://github.com/typo3/typo3/commit/d7d3f6fd04>`__
  *   `2023-08-26 e3880e7227 [TASK] Improve CKEditor vendor logo placement <https://github.com/typo3/typo3/commit/e3880e7227>`__
  *   `2023-08-18 e879029b97 [BUGFIX] Fix link attribute handling in ckeditor <https://github.com/typo3/typo3/commit/e879029b97>`__

.. _knownissues_restrictions:

Restrictions in TYPO3 12 LTS
============================

New features may always have downsides or added complexity to it, require new
knowledge or drop backwards compatibility.

These changes are usually part of a first `x.0.0` release of a major version.
However, when a new major version gains traction, features or decisions can
reach a broader audience and are discussed differently. Maybe some changes
get reviewed or improved. Or their documentation and know-how is broadened.

This section shall address things that the TYPO3 community is aware of,
and were contributions and insights are valuable.

The issues listed below are meant to sensitize developers and integrators
of possible challenges, and should not indicate specific problems/bugs. It
is also not meant as a replacement for carefully checking the list of
Deprecations and Breaking Changes in the Release Documentation, but should
highlight the areas that might be affected the most.

*   Certain API-interfaces were streamlined by evaluating a separation of
    concerns or long-needed decoupling and reducing technical debt. Especially
    in context of using the Extbase-API when outside Extbase context
    (i.e. :php:`StandaloneView`).
*   Similarly, certain interfaces or classes (especially ViewHelpers) are no
    longer inheritable by extensions, because they are now declared :php:`final`.
*   Public resources are now grouped in the new directory `_assets`, in some
    edge cases within less commonly used backend modules or areas, asset resolving
    may not work as intended and public or custom TYPO3 extensions may have issues.
*   Backend Module registration and usage has been re-done completely and requires
    refactoring.
*   Modern JavaScript (based on TypeScript) has been utilized and may present
    regressions or browser incompatibilities, the removal of `jQuery` and `requireJS`.
    may affect custom implementations.
*   The new version of `Doctrine DBAL` requires changes in (composite) Expressions
    and proper return type hinting.
*   Cross-Site-Protection (CSP) directives have been added for extra-security and
    may affect execution of Browser-plugins/add-ons or third-party / custom
    code (JavaScript, CSS, iframes, ...)
*   CKEditor 5 may require rewrites of existing custom functionality or configuration

..  note::
    TODO: Add ChangeLog references to the list statements above, add links to deprecations
    and breaking changes.


.. _faq:

Frequently Asked Questions (FAQ)
================================

Certain questions show up time and again in support channels (issue tracker, slack,
stackoverflow or inter-developer relations). The most common ones are meant to be
addressed here. The scope of this document does not care for an intense list,
but the "tip of the iceberg" to easily point people into the proper directions.

Most of the "frequently asked questions" are covered very well in the
exhaustive documentation. Searching the Documentation or also Stack Overflow
will very often lead to proper results, which this FAQ cannot cover.

This section is in its early stages and repeating questions first need to be gathered.

*   **Dependency Injection**. Many problems arise on how and where Dependency Injection
    is possible, how the :file:`Configuration/Services.yaml` needs configuring and
    what to set :yaml:`public`. Please check :ref:`the chapter on Dependency Injection <DependencyInjection>`
    and specifically :ref:`what to make public <What-to-make-public>`.
*   **CLI command or scheduler**. There are mainly two ways to implement recurring,
    automated tasks in TYPO3. One is through the :ref:`EXT:scheduler <ext_scheduler:Index>`
    that exists as a TYPO3 backend module, and allows maintainers to easily add configurable tasks.
    These tasks can be "legacy scheduler tasks" or "Command-line Interface (CLI) commands",
    basing on `Symfony Commands`. CLI commands can both be scheduled, as well as
    executed from the command line, and they can easily use `Dependency Injection`.
    Scheduler tasks are serialized, and cannot make proper use of Dependency Injection,
    but they are executed in `Backend Context` instead of `CLI context`, which may sometimes
    be of advantage. See :ref:`EXT:scheduler <ext_scheduler:DevelopersGuide/CreatingTasks/Index>`
    for more.

.. _helpinghands:

Helping hands
=============

When developing bug fixes or features, you can help TYPO3 developers very much by testing
these fixes/features. This section of the document can list specific areas, were input
would be very helpful, like:

*   Testing new Backend TypeScript for regressions
*   Testing with multiple environments (windows vs. linux, composer vs. non-composer,
    apache vs. nginx, mariadb vs. mysql vs. postgresql vs. sqlite, ...)

Ideally, this section will only list areas of interest for a short period of time when needed.
