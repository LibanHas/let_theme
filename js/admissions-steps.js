document.addEventListener('DOMContentLoaded', function () {
  // Detect language from <html lang="en"> or fallback to Japanese
  const lang = document.documentElement.lang.startsWith('en') ? 'en' : 'ja';

  const stepsData = {
    ja: {
      master: {
        april: [
          {
            number: '01',
            title: '研究室訪問・面談',
            period: '推奨時期：5〜6月',
            description: 'LET Labに訪問し、教員との面談を通じて研究内容や志望動機を整理しましょう。',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: '出願',
            period: '出願時期：6月下旬',
            description: '必要書類を準備し、出願期間内に出願を行います。',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: '入試（面接）',
            period: '実施時期：8月（※4月入学は2月に受験できる場合があります）',
            description: '研究計画に基づいた面接試験が対面で行われます。4月入学を希望する場合は、2月に受験できる場合もあります。',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: '入学',
            period: '入学時期：4月',
            description: '合格後、所定の手続きを経てLET Labでの研究生活がスタートします。',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: '研究室訪問・面談',
            period: '推奨時期：12月',
            description: '10月入学を希望する場合、前年の12月頃にLET Labを訪問し、教員と面談を行いましょう。',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: '出願',
            period: '出願時期：1月（※国際志願者は4月も可）',
            description: '一般出願は1月ですが、国際志願者には4月締切の追加期間が設けられる場合があります。',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: '入試（面接）',
            period: '実施時期：8月（2月受験も可）',
            description: '提出した研究計画に基づき、面接試験が対面で行われます。10月入学の場合、2月入試は募集枠が非常に限られており競争が激しいため、より募集枠の多い8月入試を推奨します。',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: '入学',
            period: '入学時期：10月',
            description: '入試に合格し、手続きが完了したら、10月よりLET Labでの研究が開始されます。',
            icon: 'icon-enrollment.svg'
          }
        ]
      },
      phd: {
        april: [
          {
            number: '01',
            title: '研究室訪問・面談',
            period: '推奨時期：5〜6月',
            description: 'LET Labに訪問し、教員との面談を通じて研究内容や志望動機を整理しましょう。',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: '出願',
            period: '出願時期：6月下旬',
            description: '必要書類を準備し、出願期間内に出願を行います。',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: '入試（面接）',
            period: '実施時期：8月（※4月入学は2月に受験できる場合があります）',
            description: '研究計画に基づいた面接試験が対面で行われます。4月入学を希望する場合は、2月に受験できる場合もあります。',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: '入学',
            period: '入学時期：4月',
            description: '合格後、所定の手続きを経てLET Labでの研究生活がスタートします。',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: '研究室訪問・面談',
            period: '推奨時期：12月',
            description: '10月入学を希望する場合、前年の12月頃にLET Labを訪問し、教員と面談を行いましょう。',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: '出願',
            period: '出願時期：1月（※国際志願者は4月も可）',
            description: '一般出願は1月ですが、国際志願者には4月締切の追加期間が設けられる場合があります。',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: '入試（面接）',
            period: '実施時期：8月（2月受験も可）',
            description: '提出した研究計画に基づき、面接試験が対面で行われます。10月入学の場合、2月入試は募集枠が非常に限られており競争が激しいため、より募集枠の多い8月入試を推奨します。',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: '入学',
            period: '入学時期：10月',
            description: '入試に合格し、手続きが完了したら、10月よりLET Labでの研究が開始されます。',
            icon: 'icon-enrollment.svg'
          }
        ]
      }
    },
    en: {
      master: {
        april: [
          {
            number: '01',
            title: 'Lab Visit and Interview',
            period: 'Recommended: May–June',
            description: 'Visit LET Lab and discuss your research interests and motivation with faculty members.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application',
            period: 'Application: Late June',
            description: 'Prepare the required documents and submit your application during the application period.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'Entrance Exam (Interview)',
            period: 'Exam: August (February may also be possible for April entry)',
            description: 'An in-person interview based on your research plan will be conducted. For April entry, taking the exam in February may also be possible.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Start: April',
            description: 'Upon acceptance and completing formalities, begin your research life at LET Lab.',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: 'Lab Visit and Interview',
            period: 'Recommended: December',
            description: 'If applying for October admission, visit LET Lab and consult with faculty around December of the previous year.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application',
            period: 'Application: January (*April for international applicants)',
            description: 'The standard application period is January, but international applicants may have an additional deadline in April.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'Entrance Exam (Interview)',
            period: 'Exam: August (also possible in February)',
            description: 'An in-person interview based on your research plan will be held. For October entry, the August exam is recommended because the February exam has very limited places and is therefore more competitive.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Start: October',
            description: 'After acceptance and formalities, begin research at LET Lab from October.',
            icon: 'icon-enrollment.svg'
          }
        ]
      },
      phd: {
        april: [
          {
            number: '01',
            title: 'Lab Visit & Interview',
            period: 'Recommended: May–June',
            description: 'Visit LET Lab and meet with faculty members to discuss your research interests and refine your motivation.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application',
            period: 'Application Period: Late June',
            description: 'Prepare the necessary documents and apply during the application window.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'Entrance Exam (Interview)',
            period: 'Held: August (February may also be possible for April entry)',
            description: 'An in-person interview based on your research plan will be conducted. For April entry, taking the exam in February may also be possible.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Enrollment: April',
            description: 'Upon acceptance, complete the required procedures to begin your research at LET Lab.',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: 'Lab Visit & Interview',
            period: 'Recommended: December',
            description: 'If you wish to enroll in October, visit LET Lab around December of the previous year and meet with faculty members.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application',
            period: 'Application Period: January (International applicants may also apply in April)',
            description: 'The general application period is January, but international applicants may have an additional deadline in April.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'Entrance Exam (Interview)',
            period: 'Held: August (also possible in February)',
            description: 'An in-person interview based on your submitted research plan will be conducted. For October entry, the August exam is recommended because the February exam has very limited places and is therefore more competitive.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Enrollment: October',
            description: 'Once accepted and your procedures are complete, you will begin research at LET Lab from October.',
            icon: 'icon-enrollment.svg'
          }
        ]
      }
    }
  };

  const applicantType = document.getElementById('applicantType');
  const entryTerm = document.getElementById('entryTerm');
  const stepsContainer = document.getElementById('stepsContainer');
  const themeBaseUrl = themeData.baseUrl;

  function renderSteps() {
    const type = applicantType.value;
    const term = entryTerm.value;
    const steps = stepsData[lang][type]?.[term] || [];

    stepsContainer.innerHTML = '';

    const stepColors = ['#B8D9EC', '#A0CFF2', '#7ABDE8', '#4CA3D9', '#368FCF'];

    steps.forEach((step, index) => {
      const isLast = index === steps.length - 1;
      const color = isLast ? '#F49C5B' : stepColors[index] || '#F49C5B';

      const stepEl = document.createElement('div');
      stepEl.className = 'step-box';
      stepEl.style.animationDelay = `${index * 100}ms`;

      stepEl.innerHTML = `
        <div class="step-left" style="--step-color: ${color}">
          <div class="step-label">STEP</div>
          <div class="step-number">${step.number}</div>
          ${!isLast ? '<div class="step-caret"></div>' : ''}
        </div>
        <div class="step-right">
          <div class="step-meta">📌 ${step.period}</div>
          <div class="step-title-icon">
            <div class="step-icon-wrapper">
              <img src="${themeBaseUrl}/images/${step.icon}" alt="" class="step-icon">
            </div>
            <h4>${step.title}</h4>
          </div>
          <p>${step.description}</p>
        </div>
      `;

      stepsContainer.appendChild(stepEl);
    });
  }

  applicantType.addEventListener('change', renderSteps);
  entryTerm.addEventListener('change', renderSteps);

  renderSteps();
});
